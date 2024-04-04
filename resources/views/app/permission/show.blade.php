<x-app-layout>

    <x-card title="{{ $title . ' ' . ucwords($data->name) }}" :create="false">

        <h6 class="card-title fw-semibold">List Permission</h6>
        @forelse ($data->getAllPermissions() as $data)
            <span class="badge bg-primary">{{ ucwords($data->name) }}</span>
        @empty
            <span class="badge bg-primary">Tidak terdapat permission pada role {{ $data->name }}</span>
        @endforelse

    </x-card>

</x-app-layout>
