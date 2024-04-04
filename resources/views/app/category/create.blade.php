<x-app-layout>

    <x-card title="{{ $title }}" :create="false">

        <x-form action="{{ route('category.store') }}">
            <x-form.input label="Nama Kategori" name="category_name" value="{{ old('category_name') }}" required
                autofocus />
            <div class="d-flex gap-3">
                <x-form.back href="{{ route('category.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

</x-app-layout>
