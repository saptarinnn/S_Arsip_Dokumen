<x-app-layout>

    <x-card title="{{ $title }}" :create="false">
        {{-- @dd($response['data']) --}}
        <h6 class="card-title fw-semibold mb-4">{{ strtoupper($expedition) }} (
            {{ strtoupper($receipt_number) }} )</h6>

        <div class="row">
            @if ($response->status() == 200)
                {{-- @dd($response->object()->data->history) --}}
                <ul class="list-group list-group-flush">
                    {{-- Asal --}}
                    <li class="list-group-item mb-0 pb-0">
                        <h6 class="mb-1 fw-bold">Asal</h6>
                        <div class="d-flex">
                            <strong>*</strong>
                            <p class="ms-1">{{ ucwords($response->object()->data->detail->origin) }}</p>
                        </div>
                    </li>
                    {{-- Tujuan --}}
                    <li class="list-group-item mb-0 pb-0">
                        <h6 class="mb-1 fw-bold">Tujuan</h6>
                        <div class="d-flex">
                            <strong>*</strong>
                            <p class="ms-1">{{ ucwords($response->object()->data->detail->destination) }}</p>
                        </div>
                    </li>
                    {{-- Pengirim --}}
                    <li class="list-group-item mb-0 pb-0">
                        <h6 class="mb-1 fw-bold">Pengirim</h6>
                        <div class="d-flex">
                            <strong>*</strong>
                            <p class="ms-1">{{ ucwords($response->object()->data->detail->shipper) }}</p>
                        </div>
                    </li>
                    {{-- Penerima --}}
                    <li class="list-group-item mb-0 pb-0">
                        <h6 class="mb-1 fw-bold">Penerima</h6>
                        <div class="d-flex">
                            <strong>*</strong>
                            <p class="ms-1">{{ ucwords($response->object()->data->detail->receiver) }}</p>
                        </div>
                    </li>
                    <li class="list-group-item mb-0 pb-0">
                        <h6 class="mb-2 fw-bold">Perjalanan Paket</h6>
                        <ul class="list-group list-group-timeline">
                            @foreach ($response->object()->data->history as $data)
                                <li class="list-group-item list-group-timeline-primary">
                                    <small><strong>{{ $data->date }}</strong> -
                                        {{ $data->desc }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            @else
                <div class="col-12">
                    <span class="text-center">Maaf, Nomor Resi Tidak Tersedia.</span>
                </div>
            @endif
        </div>

    </x-card>

</x-app-layout>
