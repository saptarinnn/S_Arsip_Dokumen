<x-app-layout>
    <x-card title="{{ $title }}" href="{{ route('role.create') }}">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <x-table>
            <x-slot name="thead">
                <th>Nama Role </th>
                <th>Aksi</th>
            </x-slot>

            @foreach ($datas as $data)
                <tr>
                    <td>{{ ucwords($data->name) }}</td>
                    <td>
                        <x-table.btn-show href="{{ route('role.show', $data->uuid) }}" />
                        <x-table.btn-edit href="{{ route('role.edit', $data->uuid) }}" />
                        <x-table.btn-delete action="{{ route('role.destroy', $data->uuid) }}" />
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
