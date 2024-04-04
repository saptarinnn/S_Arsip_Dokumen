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
            <x-form.input label="Petugas Pengirim Dokumen" name=""
                value="{{ ucwords(auth()->user()->fullname) }}" required readonly />
            <x-form.select name="expedition" label="Ekspedisi" required>
                <option value="">Pilih salah satu</option>
                @foreach ($lists->object() as $list)
                    <option value="{{ $list->code }}">{{ ucwords($list->description) }}</option>
                @endforeach
            </x-form.select>
            <x-form.input label="Nomor Resi" name="receipt_number" value="{{ old('receipt_number') }}" required />
            <x-form.input label="" name="user_id" value="{{ auth()->user()->id }}" required type="hidden" />

            <div class="gap-3 d-flex">
                <x-form.back href="{{ route('outgoing-document.index') }}" />
                <x-form.save />
            </div>
        </x-form>

    </x-card>

</x-app-layout>
