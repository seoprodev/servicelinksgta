@extends('frontend.provider.partials.master')

@section('title', 'My Chats')

@push('styles')
    <style>
        a.chat-link {
            background: grey;
            padding: 5px;
            border-radius: 5px;
            color: #fff;
            position: relative;
        }
        .chat-link.active {
            background: #003b57 !important;
            color: #ffff !important;
        }
        .unread-badge {
            position: absolute;
            right: 10px;
            top: 5px;
            background: red;
            color: #fff;
            font-size: 12px;
            padding: 2px 6px;
            border-radius: 12px;
        }

        /* loader ke liye chhota spinner */
        .btn-loader {
            display: inline-block;
            width: 14px;
            height: 14px;
            border: 2px solid #fff;   /* white border (button ke color k hisaab se change kar sakte ho) */
            border-top: 2px solid transparent;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            margin-right: 6px; /* text aur spinner ke beech thoda gap */
            vertical-align: middle;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }



    </style>
@endpush

@section('provider-dashboard-content')
    <div class="col-xl-12 col-lg-12">
        <div class="row">
            <!-- LEFT SIDEBAR -->
            <div class="col-3 border-end" style="height: 80vh; overflow-y: auto;">
                <h5 class="p-3 border-bottom">Chats</h5>

                <!-- Search -->
                <div class="p-2">
                    <input type="text" id="user-search" class="form-control" placeholder="Search users...">
                    <ul id="search-results" class="list-group mt-2"></ul>
                    <div id="search-loader" class="text-center mt-2" style="display:none;">
                        <div class="spinner-border text-primary" role="status" style="width: 2rem; height: 2rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>

                <!-- Conversation List -->
                <ul id="chat-user-list" class="list-group list-group-flush">
                    @forelse($chatUsers as $user)
                        <li class="list-group-item">
                            <a href="javascript:void(0)"
                               class="chat-link d-block text-decoration-none"
                               data-id="{{ $user->id }}"
                               data-name="{{ $user->name }}"
                               data-avatar="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('frontend-assets/img/user-default.jpg') }}">
                                {{ $user->name }}
                            </a>
                        </li>
                    @empty
                        <li class="list-group-item text-muted">No chats yet.</li>
                    @endforelse
                </ul>
            </div>

            <!-- RIGHT CHAT AREA -->
            <div class="col-9 d-flex flex-column" style="height: 80vh;">
                <!-- Chat Header -->
                <div id="chat-header" class="border-bottom p-3 text-muted">
                    Select a conversation
                </div>

                <!-- Chat Messages -->
                <div id="chat-box" class="flex-grow-1 p-3"
                     style="overflow-y: auto; background: #f8f9fa;">
                </div>

                <!-- Chat Form -->
                <form id="chat-form" class="border-top d-flex p-2" style="display:none !important;">
                    @csrf
                    <input type="hidden" id="receiver_id" name="receiver_id">
                    <input type="text" id="message" class="form-control me-2" placeholder="Type a message..." required>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
    <script>
        const csrfToken = "{{ csrf_token() }}";
        const loggedInUser = "{{ auth()->id() }}";

        let activeUserId = null;

        // --- Initialize Pusher ---
        Pusher.logToConsole = false;
        const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}'
        });
        const personalChannel = pusher.subscribe('chat.' + loggedInUser);

        // --- Helpers ---
        function scrollToBottom() {
            $("#chat-box").scrollTop($("#chat-box")[0].scrollHeight);
        }

        function appendMessage(message) {
            const userId = message.user_id || (message.sender ? message.sender.id : null);
            const isMine = (userId == loggedInUser);

            const msgHtml = `
            <div class="mb-2 mt-3 ${isMine ? 'text-end' : 'text-start'}">
                <span class="p-2 rounded ${isMine ? 'bg-primary text-white' : 'bg-light'}">
                    ${message.body}
                </span>
            </div>`;
            $("#chat-box").append(msgHtml);
            scrollToBottom();
        }

        function loadChat(userId, name, avatarUrl) {
            activeUserId = userId;
            $("#receiver_id").val(userId);
            $("#chat-box").html("");
            $("#chat-header").html(`
                <div class="d-flex align-items-center">
                    <img src="${avatarUrl}"
                         alt="${name}"
                         class="rounded-circle me-2"
                         style="width:40px; height:40px; object-fit:cover;">
                    <strong>
                            ${name}
                    </strong>
                </div>
            `);
            $("#chat-form").show();

            $(".chat-link").removeClass("active");
            $(`.chat-link[data-id="${userId}"]`).addClass("active");

            $.get(`/user/chat/${userId}/messages`, (response) => {
                response.forEach(msg => appendMessage(msg));
            });
        }

        $(document).on("click", ".chat-link", function(e) {
            e.preventDefault();
            loadChat(
                $(this).data("id"),
                $(this).data("name"),
                $(this).data("avatar")
            );
        });

        $(document).on("click", ".chat-link, .start-chat", function(e) {
            e.preventDefault();
            loadChat(
                $(this).data("id"),
                $(this).data("name"),
                $(this).data("avatar")
            );
            $("#search-results").html("");
            $("#user-search").val("");
        });



        {{--$("#chat-form").on("submit", function(e) {--}}
        {{--    e.preventDefault();--}}

        {{--    let msg = $("#message").val().trim();--}}
        {{--    if (!msg || !activeUserId) return;--}}

        {{--    let $form = $(this);--}}

        {{--    let $btn = $form.find("button[type='submit']");--}}
        {{--    let $input = $("#message");--}}
        {{--    $btn.prop("disabled", true).text("Sending...");--}}

        {{--    // let oldHtml = $btn.html(); // button ka original text save--}}

        {{--    $.ajax({--}}
        {{--        url: "{{ route('chat.send') }}",--}}
        {{--        type: "POST",--}}
        {{--        data: {--}}
        {{--            _token: csrfToken,--}}
        {{--            message: msg,--}}
        {{--            receiver_id: activeUserId--}}
        {{--        },--}}
        {{--        beforeSend: function() {--}}
        {{--            $btn.prop("disabled", true).text("Sending...");--}}
        {{--        },--}}
        {{--        success: function(response) {--}}
        {{--            // naya message chat box me append--}}
        {{--            appendMessage({ user_id: loggedInUser, body: msg });--}}
        {{--            $input.val("");--}}
        {{--            $btn.prop("disabled", false).text("Send");--}}
        {{--        },--}}
        {{--        error: function(xhr) {--}}
        {{--            $btn.prop("disabled", false).text("Send");--}}

        {{--            alert("❌ Something went wrong. Please try again.");--}}
        {{--            console.error(xhr.responseText);--}}
        {{--        },--}}
        {{--        complete: function() {--}}
        {{--            // input aur button enable + restore--}}
        {{--            $input.prop("disabled", false).focus();--}}
        {{--            $btn.prop("disabled", false).text("Send");--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}
        $("#chat-form").on("submit", function(e) {
            e.preventDefault();

            let msg = $("#message").val().trim();
            if (!msg || !activeUserId) return;

            let $form = $(this);
            let $btn = $form.find("button[type='submit']");
            let $input = $("#message");

            $.ajax({
                url: "{{ route('chat.send') }}",
                type: "POST",
                data: {
                    _token: csrfToken,
                    message: msg,
                    receiver_id: activeUserId
                },
                beforeSend: function() {
                    $btn.prop("disabled", true).text("Sending...");
                    $input.prop("disabled", true);
                },
                success: function(response) {
                    appendMessage({ user_id: loggedInUser, body: msg });
                    $input.val("");
                },
                error: function(xhr) {
                    alert("❌ Something went wrong. Please try again.");
                    console.error(xhr.responseText);
                },
                complete: function() {
                    $btn.prop("disabled", false).text("Send");
                    $input.prop("disabled", false).focus();
                }
            });
        });






        personalChannel.bind('message-sent', function(data) {
            appendMessage(data.message);
        });

        $("#user-search").on("keyup", function() {
            let q = $(this).val().trim();
            if (q.length < 2) {
                $("#search-results").html("");
                $("#search-loader").hide();
                return;
            }

            $("#search-loader").show();
            $("#search-results").html("");

            $.get("{{ route('chat.search.provider') }}", { q }, function(data) {
                $("#search-loader").hide();
                if (data.length === 0) {
                    $("#search-results").html(`<li class="list-group-item text-muted">No results found</li>`);
                    return;
                }
                {{--let html = data.map(user => `--}}
                {{--<li class="list-group-item">--}}
                {{--    <button class="btn btn-link p-0 start-chat"--}}
                {{--            data-id="${user.id}"--}}
                {{--            data-name="${user.name}" data-avatar="{{ user.profile.avatar ? asset(user->profile->avatar) : asset('frontend-assets/img/default-avatar.png') }}">--}}
                {{--        ${user.name}--}}
                {{--    </button>--}}
                {{--</li>`).join("");--}}

                let html = data.map(user => `
                    <li class="list-group-item">
                        <button class="btn btn-link p-0 start-chat"
                                data-id="${user.id}"
                                data-name="${user.name}"
                                data-avatar="${user.avatar}">
                            <img src="${user.avatar}"
                                 alt="avatar"
                                 class="rounded-circle me-2"
                                 style="width:30px; height:30px; object-fit:cover;">
                            ${user.name}
                        </button>
                    </li>
                `).join("");
                $("#search-results").html(html);
            });
        });
    </script>
@endpush
