<div class="form-group mb-3">
    <label for="{{ $id }}">{{ $label }}</label>
    <div class="input-group has-validation">
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $id }}"
            class="form-control @error($id) is-invalid @enderror" value="{{ old($id) ?? $value }}" required autofocus>

        @error($id)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
