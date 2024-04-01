@extends('partials.app')

@section('content')
    @php
        $pesan = session('pesan');
    @endphp
    <h1>Master Pengguna</h1>
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
    <h2 class="h3">Tambah Pengguna</h2>
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('pengguna.create') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Pengguna</label>
                    <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" required />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" required />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" required />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="peran" class="form-label">Peran</label>
                    <select name="peran" class="form-select @error('peran') is-invalid @enderror" id="peran" required>
                        <option selected disabled>Pilih peran...</option>
                        <option value="1">ADMIN</option>
                        <option value="2">PETUGAS</option>
                    </select>
                    @error('peran')
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
    <h2 class="h4 mb-3">Daftar Pengguna</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th></th>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Email</th>
                <th>Peran</th>
            </tr>
        </thead>
        <tbody>
            @if (count($data) > 0)
                @foreach ($data as $item)
                    <tr>
                        <th>
                            <a class="btn btn-sm btn-success" href="{{ route('pengguna.edit', ['id' => $item->id]) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="{{ route('pengguna.delete', ['id' => $item->id]) }}" onclick="return confirm('Yakin?')">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </th>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            @if ($item->peran == 1)
                                ADMIN
                            @elseif ($item->peran == 2)
                                PETUGAS
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Tidak ada pengguna.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
