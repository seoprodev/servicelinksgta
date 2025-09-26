@extends('frontend.user.partials.master')
@push('styles')
    <style>
        a.chat-link.d-block.text-decoration-none {
            background: grey;
            padding: 5px;
            border-radius: 5px;
            color: #ffff;
        }
        .chat-link.active{
            background: #003b57 !important;
            color: #ffff !important;
        }
    </style>
@endpush

@section('title', 'My Chats')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
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

                <!-- Chat Users List -->
                <ul id="chat-user-list" class="list-group list-group-flush">
                    @forelse($chatUsers as $user)
                        <li class="list-group-item">
                            <a href="javascript:void(0)"
                               class="chat-link d-block text-decoration-none"
                               data-id="{{ $user->id }}"
                               data-name="{{ $user->name }}" data-profile="{{ route('user.provider.detail', $user->faker_id) }}"
                               data-avatar="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('frontend-assets/img/default-avatar.png') }}">
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
                    Select a chat
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
                    <button class="btn btn-primary">Send</button>
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

        const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}'
        });
        const personalChannel = pusher.subscribe('chat.' + loggedInUser);

        /** ---------------------------
         *  UTILITIES
         * --------------------------- */
        const ajaxCall = (url, method = "GET", data = {}, onSuccess = () => {}) => {
            $.ajax({
                url, method, data,
                headers: { "X-CSRF-TOKEN": csrfToken },
                success: onSuccess,
                error: (xhr) => console.error("Error:", xhr.responseText)
            });
        };

        const appendMessage = (message) => {
            let userId = message.user_id || (message.sender?.id ?? null);
            let isMine = (userId == loggedInUser);

            let msgHtml = `
            <div class="mb-2 mt-3 ${isMine ? 'text-end' : 'text-start'}">
                <span class="p-2 rounded ${isMine ? 'bg-primary text-white' : 'bg-light'}">
                    ${message.body}
                </span>
            </div>`;

            $("#chat-box").append(msgHtml).scrollTop($("#chat-box")[0].scrollHeight);
        };

        /** ---------------------------
         *  CHAT HANDLERS
         * --------------------------- */
        function loadChat(userId, name, profileUrl, avatarUrl) {
            activeUserId = userId;
            $("#receiver_id").val(userId);
            $("#chat-box").html(`<div class="text-center text-muted mt-3">Loading...</div>`);
            // $("#chat-header").html(`<strong>${name}</strong>`);
            $("#chat-header").html(`
                <div class="d-flex align-items-center">
                    <img src="${avatarUrl}"
                         alt="${name}"
                         class="rounded-circle me-2"
                         style="width:40px; height:40px; object-fit:cover;">
                    <strong>
                        <a href="${profileUrl}" target="_blank" class="text-decoration-none">
                            ${name}
                        </a>
                    </strong>
                </div>
            `);
            $("#chat-form").show();

            $(".chat-link").removeClass("active");
            $(`.chat-link[data-id="${userId}"]`).addClass("active");

            ajaxCall(`/user/chat/${userId}/messages`, "GET", {}, (response) => {
                $("#chat-box").html("");
                response.forEach(msg => appendMessage(msg));
            });
        }

        // Sidebar user click
        $(document).on("click", ".chat-link", function(e) {
            e.preventDefault();
            loadChat(
                $(this).data("id"),
                $(this).data("name"),
                $(this).data("profile"),
                $(this).data("avatar")
            );
        });

        // Send message
        $("#chat-form").on("submit", function(e) {
            e.preventDefault();
            let $btn = $(this).find("button");
            let msg = $("#message").val().trim();
            if (!msg || !activeUserId) return;

            $btn.prop("disabled", true).text("Sending...");

            ajaxCall("{{ route('chat.send') }}", "POST", {
                message: msg, receiver_id: activeUserId
            }, () => {
                appendMessage({ user_id: loggedInUser, body: msg });
                $("#message").val("");
                $btn.prop("disabled", false).text("Send");
            });
        });

        personalChannel.bind("message-sent", function(data) {
            appendMessage(data.message);
            // TODO: agar sidebar me active nahi hai to "new message" badge show karo
        });

        /** ---------------------------
         *  USER SEARCH
         * --------------------------- */
        let debounceTimer;
        $("#user-search").on("keyup", function() {
            clearTimeout(debounceTimer);
            let q = $(this).val().trim();
            if (q.length < 2) {
                $("#search-results").html("");
                return;
            }

            $("#search-loader").show();
            debounceTimer = setTimeout(() => {
                ajaxCall("{{ route('chat.search.users') }}", "GET", { q }, (data) => {
                    $("#search-loader").hide();
                    if (!data.length) {
                        return $("#search-results").html(
                            `<li class="list-group-item text-muted">No results found</li>`
                        );
                    }

                    let html = data.map(user => `
                    <li class="list-group-item">
                        <button class="btn btn-link p-0 start-chat"
                                data-id="${user.id}"
                                data-name="${user.name}">
                            ${user.name}
                        </button>
                    </li>`).join("");
                    $("#search-results").html(html);
                });
            }, 400); // debounce 400ms
        });

        // Start new chat
        $(document).on("click", ".start-chat", function(e) {
            e.preventDefault();
            loadChat($(this).data("id"), $(this).data("name"));
            $("#search-results").html("");
            $("#user-search").val("");
        });
    </script>

@endpush
