@extends('partials.app')

@section('content')
    @php
        $pesan = session('pesan');
    @endphp
    <h1>Master Produk</h1>
    <hr class="my-2" />
    @if (isset($pesan))
        @if ($pesan['status'] == 'berhasil')
            <div class="alert alert-success" role="alert">
                {{ $pesan['pesan'] }}
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                {{ $pesan['pesan'] }}
            </div>
        @endif
    @endif
    <h2 class="h3">Tambah Produk</h2>
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('produk.create') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" required />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="harga" class="form-label">Harga</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">Rp</span>
                        <input name="harga" type="number" min="0" pattern="[0-9]" class="form-control @error('harga') is-invalid @enderror" id="harga" required />
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input name="stok" type="number" min="0" pattern="[0-9]" class="form-control @error('stok') is-invalid @enderror" id="stok" required />
                    @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <hr class="my-2" />
    <h2 class="h4 mb-3">Daftar Produk</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th></th>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <th>
                            <a class="btn btn-sm btn-success" href="{{ route('produk.edit', ['id' => $item->id]) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="{{ route('produk.delete', ['id' => $item->id]) }}" onclick="return confirm('Yakin?')">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </th>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>Rp {{ $item->harga }}</td>
                        <td>{{ $item->stok }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Tidak ada produk.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
