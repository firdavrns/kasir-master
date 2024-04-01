@extends('partials.app')

@section('content')
    <h1>Master Pengguna</h1>
    <hr class="my-2" />
    <h2 class="h3">Edit Pengguna</h2>
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('pengguna.update') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $data->id }}" hidden>
                <div class="mb-2">
                    <label for="nama" class="form-label">Nama Pengguna</label>
                    <input name="nama" type="text" value="{{ $data->nama }}" class="form-control @error('nama') is-invalid @enderror" id="nama" required />
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" value="{{ $data->email }}" class="form-control @error('email') is-invalid @enderror" id="email" required />
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
                        <option value="1" @if ($data->peran == 1) selected @endif>ADMIN</option>
                        <option value="2" @if ($data->peran == 2) selected @endif>PETUGAS</option>
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
@endsection
