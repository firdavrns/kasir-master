@extends('partials.auth')

@section('content')
    @php
        $pesan = session('pesan');
    @endphp
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('auth.registration.process') }}" method="POST">
            @csrf
            <h1 class="h3 fw-normal">KASIR</h1>
            <h2 class="h5 mb-3 fw-normal">Registrasi</h2>

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

            <div class="form-floating mb-1">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Nama" required>
                <label for="nama">Nama</label>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-1">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-1">
                <input type="password" class="form-control @error('nama') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-5">
                <select name="peran" class="form-select @error('peran') is-invalid @enderror" id="peran" required>
                    <option selected disabled>Pilih peran...</option>
                    <option value="1">ADMIN</option>
                    <option value="2">PETUGAS</option>
                </select>
                <label for="peran">Peran</label>
                @error('peran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Registrasi</button>
            <p class="mt-2 text-center">
                <a href="{{ route('auth.login') }}">Masuk</a>
            </p>
        </form>
    </main>
@endsection
