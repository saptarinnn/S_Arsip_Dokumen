<x-app-layout>
    <x-card title="{{ $title }}" href="{{ route('incoming-document.create') }}">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <x-table>
            <x-slot name="thead">
                <th class="text-center">Kode Dokumen</th>
                <th>Tanggal Masuk</th>
                <th>Kategori</th>
                <th>Penyimpanan</th>
                <th>File</th>
                <th>Petugas Penerima</th>
                <th>Aksi</th>
            </x-slot>

            @foreach ($datas as $data)
                <tr>
                    <td class="text-center">{{ $data->document_code }}</td>
                    <td>{{ convertYmdToMdy($data->date_in) }}</td>
                    <td>{{ ucwords($data->category->category_name) }}</td>
                    <td>{{ ucwords($data->storage->storage_name) }}</td>
                    <td><a href="{{ Storage::url($data->file) }}">Unduh Dokumen</a></td>
                    <td>{{ ucwords($data->user->fullname) }}</td>
                    <td>
                        {{-- <x-table.btn-show href="{{ route('incoming-document.show', $data->id) }}" /> --}}
                        <x-table.btn-delete action="{{ route('incoming-document.destroy', $data->id) }}" />
                    </td>
                </tr>
            @endforeach

        </x-table>
    </x-card>

    <x-slot name="script">
        <script type="module">
            $('#example').DataTable();
        </script>
    </x-slot>
</x-app-layout>
