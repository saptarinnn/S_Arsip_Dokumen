@props(['name', 'label', 'type' => 'text'])
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}" class="@error($name) is-invalid @enderror form-control" id="{{ $name }}"
        name="{{ $name }}" {{ $attributes }} />
    @error($name)
        <div class="small mt-1 text-danger">{{ $message }}</div>
    @enderror
</div>
