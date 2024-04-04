<x-app-layout>

    <x-card title="{{ $title }}" :create="false">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <x-form action="{{ route('permission.store') }}">
            <x-form.input label="Nama Permission" name="name" value="{{ old('name') }}" autofocus required />
            <div class="d-flex gap-3">
                <x-form.back href="{{ route('permission.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

</x-app-layout>
