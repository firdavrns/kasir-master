@extends('partials.app')

@section('content')
    <h1>Master Pelanggan</h1>
    <hr class="my-2" />
    <h2 class="h3">Edit Pelanggan</h2>
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('pelanggan.update') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $data->id }}" hidden>
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Pelanggan</label>
                    <input name="nama" type="text" value="{{ $data->nama }}" class="form-control @error('nama') is-invalid @enderror" id="nama" required />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" required>{{ $data->alamat }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input name="nomor_telepon" type="text" value="{{ $data->nomor_telepon }}" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" required />
                    @error('nomor_telepon')
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
