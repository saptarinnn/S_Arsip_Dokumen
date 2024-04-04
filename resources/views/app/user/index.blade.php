<x-app-layout>
    <x-card title="{{ $title }}" href="{{ route('user.create') }}">

        @if (session('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <x-table>
            <x-slot name="thead">
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Role</th>
                <th>Aksi</th>
            </x-slot>

            @foreach ($datas as $data)
                <tr>
                    <td>{{ ucwords($data->username) }}</td>
                    <td>{{ ucwords($data->fullname) }}</td>
                    <td>{{ ucwords(str_replace(['[', ']', '"'], '', $data->getRoleNames())) }}</td>
                    <td>
                        <x-table.btn-edit href="{{ route('user.edit', $data->id) }}" />
                        <x-table.btn-delete action="{{ route('user.destroy', $data->id) }}" />
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
