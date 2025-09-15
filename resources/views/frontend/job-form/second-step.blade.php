<div id="step2">
    <h2>What type of service do you need?</h2>
    <div class="radio-group" id="serviceOptions">
        @foreach($services as $service)
            <label class="radio-box">
                <input type="radio" name="service_for" value="{{ $service->id }}" onchange="hideOtherField('serviceOptions')">
                <span>{{ $service->name }}</span>
            </label>
        @endforeach

        {{-- Other Option --}}
        <label class="radio-box">
            <input type="radio" name="service_for" value="Other" onchange="showOtherField(this,'serviceOptions')">
            <span>Other</span>
        </label>
    </div>
    <div id="serviceOptions_otherContainer"></div>
    <span class="invalid-feedback" id="service_for_error"></span>

    <div class="btn-group">
        <button type="button" class="next-btn" onclick="goToPrevStep('{{ route('job.step1') }}')">Back</button>
        <button type="button" class="next-btn" onclick="goToNextStep('{{ route('job.step2') }}')">Next</button>
    </div>
</div>

<script>
    function showOtherField(radio, containerId) {
        hideOtherField(containerId);
        if (radio.checked && radio.value === "Other") {
            const container = document.getElementById(containerId + "_otherContainer");
            const input = document.createElement("input");
            input.type = "text";
            input.name = "service_for_other";
            input.placeholder = "Please specify...";
            input.classList.add("other-input");
            container.appendChild(input);
        }
    }

    function hideOtherField(containerId) {
        const container = document.getElementById(containerId + "_otherContainer");
        container.innerHTML = "";
    }
</script>
