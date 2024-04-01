@extends('partials.app')

@section('content')
    <h1>Master Produk</h1>
    <hr class="my-2" />
    <h2 class="h3">Edit Produk</h2>
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('produk.update') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $data->id }}" hidden>
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Produk</label>
                    <input name="nama" type="text" value="{{ $data->nama }}" class="form-control @error('nama') is-invalid @enderror" id="nama" required />
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
                        <input name="harga" type="number" value="{{ (float) $data->harga }}" min="0" pattern="[0-9]" class="form-control @error('harga') is-invalid @enderror" id="harga" required />
                        @error('harga')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input name="stok" type="number" value="{{ $data->stok }}" min="0" pattern="[0-9]" class="form-control @error('stok') is-invalid @enderror" id="stok" required />
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
@endsection
