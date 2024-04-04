<x-app-layout>

    <x-card title="{{ $title }}" :create="false">

        <x-form enctype="multipart/form-data" action="{{ route('outgoing-document.store') }}">
            <x-form.input label="Kode Dokumen" name="document_code" value="{{ old('document_code') }}" required />
            <x-form.input label="Tgl. Keluar Dokumen" name="date_out" value="{{ old('date_out') }}" type="date"
                required />
            <x-form.select name="category_id" label="Kategori Dokumen" required>
                <option value="">Pilih salah satu</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ ucwords($category->category_name) }}</option>
                @endforeach
            </x-form.select>
            <x-form.input label="Berkas Dokumen" name="file" value="{{ old('file') }}" type="file" required />
            <x-form.select name="user_id" label="Petugas Pengirim Dokumen" required>
                <option value="">Pilih salah satu</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ ucwords($user->fullname) }}</option>
                @endforeach
            </x-form.select>

            <div class="gap-3 d-flex">
                <x-form.back href="{{ route('outgoing-document.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

</x-app-layout>
