<x-app-layout>

    <x-card title="{{ $title . ' ' . ucwords($data->name) }}" :create="false">

        <h6 class="card-title fw-semibold">List Permission</h6>
        <div class="row">
            @forelse ($data->getAllPermissions() as $data)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <ul>
                        <li>{{ ucwords($data->name) }}</li>
                    </ul>
                </div>
            @empty
                <div class="col-12">
                    <span class="text-center">Tidak terdapat <i>Permission</i> pada Role {{ $data->name }}</span>
                </div>
            @endforelse
        </div>

    </x-card>

</x-app-layout>
