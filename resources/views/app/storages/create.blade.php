<x-app-layout>

    <x-card title="{{ $title }}" :create="false">

        <x-form action="{{ route('storages.store') }}">
            <x-form.input label="Nama Brankas" name="storage_name" value="{{ old('storage_name') }}" required autofocus />
            <div class="d-flex gap-3">
                <x-form.back href="{{ route('storages.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

</x-app-layout>
