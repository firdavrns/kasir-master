<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
</head>

<body>
    @error('bulan')
        <h1 style="color: #f00;">{{ $message }}</h1>
    @enderror
    <h1>Laporan Penjualan</h1>
    <h3>Bulan {{ $bulan }} Tahun {{ $tahun }}</h3>

    <hr />

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Nota</th>
                <th>Tanggal</th>
                <th>Nama Produk</th>
                <th>Nama Pelanggan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nomor_nota }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->nama_pelanggan ?? 'Umum' }}</td>
                        <td>Rp {{ $item->harga }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp {{ $item->subtotal }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="6">Total</td>
                    <td>{{ $jumlah }}</td>
                    <td>Rp {{ $total }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="8">Tidak ada penjualan.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>

</html>
