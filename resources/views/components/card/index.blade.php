@props(['title', 'href', 'create' => true])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <h5 class="card-title fw-semibold">{{ $title }}</h5>
        @if ($create)
            <a href="{{ $href }}" class="btn btn-sm btn-primary">Tambah Data</a>
        @endif
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
