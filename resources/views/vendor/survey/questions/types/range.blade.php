@component('survey::questions.base', compact('question'))
    <div class="form-group">
        <label for="{{ $question->key }}">{{ $question->content }}</label>

        <input type="range" class="form-control-range" name="{{ $question->key }}" id="{{ $question->key }}"
            min="{{ getRuleValue($question->rules, 'min') ?? 0 }}"
            max="{{ getRuleValue($question->rules, 'max') ?? 5 }}"
            step="{{ getRuleValue($question->rules, 'step') ?? 1 }}"
            value="{{ old($question->key, $value ?? (getRuleValue($question->rules, 'default') ?? '')) }}"
            {{ $disabled ?? false ? 'disabled' : '' }}>
        <div class="mt-2">
            <span id="{{ $question->key }}-value"></span>
        </div>
    </div>

    <script>
        const rangeInput = document.getElementById("{{ $question->key }}");
        const rangeValue = document.getElementById("{{ $question->key }}-value");

        rangeValue.textContent = rangeInput.value;

        rangeInput.addEventListener("input", function() {
            rangeValue.textContent = this.value;
        });
    </script>
@endcomponent
