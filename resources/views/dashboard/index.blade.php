@extends('partials.app')

@section('content')
    <h1>Dashboard</h1>
    <hr class="my-2" />
    <div class="h2 py-3 px-1">
        Selamat Datang, {{ session('user')->nama }} !
    </div>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Penjualan Hari Ini</h5>
                    <p class="h1">Rp {{ $total }}</p>
                    <a href="{{ route('riwayat.index') }}" class="card-link">Lihat Riwayat</a>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sisa Stok</h5>
                    <p class="h1">{{ $stok }} produk</p>
                    <a href="{{ route('produk.index') }}" class="card-link">Lihat Stok</a>
                </div>
            </div>
        </div>
    </div>
@endsection
