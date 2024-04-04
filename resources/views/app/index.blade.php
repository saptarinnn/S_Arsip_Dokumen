<x-app-layout>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title fw-semibold my-0 py-0">Dashboard</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fw-semibold mb-2">Transaksi Dokumen Masuk {{ date('Y') }}</h6>
                    <canvas id="masuk"></canvas>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title fw-semibold mb-2">Transaksi Dokumen Keluar {{ date('Y') }}</h6>
                    <canvas id="keluar"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title fw-semibold my-0 py-0 mb-4">Dokumen Masuk Bulan {{ date('F') }} Tahun
                {{ date('Y') }}
            </h5>
            <x-table>
                <x-slot name="thead">
                    <th class="text-center">Kode Dokumen</th>
                    <th>Tanggal Masuk</th>
                    <th>Kategori</th>
                    <th>Penyimpanan</th>
                    <th>File</th>
                    <th>Petugas Penerima</th>
                </x-slot>

                @foreach ($datas as $data)
                    <tr>
                        <td class="text-center">{{ $data->document_code }}</td>
                        <td>{{ convertYmdToMdy($data->date_in) }}</td>
                        <td>{{ ucwords($data->category->category_name) }}</td>
                        <td>{{ ucwords($data->storage->storage_name) }}</td>
                        <td><a href="{{ Storage::url($data->file) }}">Unduh Dokumen</a></td>
                        <td>{{ ucwords($data->user->fullname) }}</td>
                    </tr>
                @endforeach

            </x-table>
        </div>
    </div>

    <x-slot name="script">
        <script type="module">
            $('#example').DataTable();

            const masuk = document.getElementById('masuk');
            const keluar = document.getElementById('keluar');

            new Chart(masuk, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Transaksi',
                        data: @json($incomings),
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            new Chart(keluar, {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Transaksi',
                        data: @json($outgoing),
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </x-slot>
</x-app-layout>
