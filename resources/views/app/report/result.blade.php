<!DOCTYPE html>
<html>

<head>
    <title>Laporan Dokumen {{ ucwords($document) }} Tahun {{ $year }}</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <div>
        <center>
            <h2>Laporan Dokumen {{ ucwords($document) }} Tahun {{ $year }}</h2>
        </center>
        <br />
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tgl. Masuk</th>
                    <th>Kode Dokumen</th>
                    <th>Kategori</th>
                    @if ($document == 'masuk')
                        <th>Penyimpanan</th>
                    @endif
                    <th>Petugas</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1 @endphp
                @foreach ($datas as $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        @if ($document == 'masuk')
                            <td>{{ convertYmdToMdy($data->date_in) }}</td>
                        @else
                            <td>{{ convertYmdToMdy($data->date_out) }}</td>
                        @endif
                        <td>{{ $data->document_code }}</td>
                        <td>{{ ucwords($data->category->category_name) }}</td>
                        @if ($document == 'masuk')
                            <td>{{ ucwords($data->storage->storage_name) }}</td>
                        @endif
                        <td>{{ ucwords($data->user->fullname) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
