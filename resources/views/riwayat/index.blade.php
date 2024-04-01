@extends('partials.app')

@section('content')
    @php
        $pesan = session('pesan');
    @endphp
    <h1>Riwayat</h1>
    <hr class="my-2" />
    <table class="table table-bordered table-striped table-hover">
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
            @else
                <tr>
                    <td colspan="8">Tidak ada riwayat.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
