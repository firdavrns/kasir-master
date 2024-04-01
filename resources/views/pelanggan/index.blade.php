@extends('partials.app')

@section('content')
    @php
        $pesan = session('pesan');
    @endphp
    <h1>Master Pelanggan</h1>
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
    <h2 class="h3">Tambah Pelanggan</h2>
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('pelanggan.create') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Pelanggan</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" required />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="alamat" required></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                    <input name="nomor_telepon" type="text" class="form-control @error('nomor_telepon') is-invalid @enderror" id="nomor_telepon" required />
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
    <hr class="my-2" />
    <h2 class="h4 mb-3">Daftar Pelanggan</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th></th>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <th>
                            <a class="btn btn-sm btn-success" href="{{ route('pelanggan.edit', ['id' => $item->id]) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="{{ route('pelanggan.delete', ['id' => $item->id]) }}" onclick="return confirm('Yakin?')">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </th>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Tidak ada pelanggan.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
