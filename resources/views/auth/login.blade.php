@extends('partials.auth')

@section('content')
    @php
        $pesan = session('pesan');
    @endphp
    <main class="form-signin w-100 m-auto">
        <form action="{{ route('auth.login.process') }}" method="POST">
            @csrf
            <h1 class="h3 fw-normal">KASIR</h1>
            <h2 class="h5 mb-3 fw-normal">Masuk</h2>

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
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required>
                <label for="email">Email</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-5">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Masuk</button>
            <p class="mt-2 text-center">
                <a href="{{ route('auth.registration') }}">Registrasi</a>
            </p>
        </form>
    </main>
@endsection
