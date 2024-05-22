@props(['title', 'href', 'create' => true])

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <h4 class="card-title fw-semibold">{{ $title }}</h4>

        @if(auth()->user()->can('incoming-document.create') || auth()->user()->can('outgoing-document.create') ||
        auth()->user()->can('permission.create') || auth()->user()->can('role.create') ||
        auth()->user()->can('user.create') || auth()->user()->can('category.create') ||
        auth()->user()->can('storage.create'))
        @if ($create)
        <a href="{{ $href }}" class="btn btn-sm btn-primary">Tambah Data</a>
        @endif
        @endif
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
