<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select class="@error($name) is-invalid @enderror form-select" name="{{ $name }}" id="{{ $name }}"
        {{ $attributes }}>
        {{ $slot }}
    </select>
    @error($name)
        <div class="small mt-1 text-danger">{{ $message }}</div>
    @enderror
</div>
