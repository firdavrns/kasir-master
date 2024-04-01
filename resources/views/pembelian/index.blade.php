@extends('partials.app')

@section('content')
    @php
        $pesan = session('pesan');
    @endphp
    <h1>Pembelian</h1>
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
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('pembelian.create') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="nomor_nota" class="form-label">Nomor Nota</label>
                    <input name="nomor_nota" type="text" value="{{ session('nomor_nota') }}" class="form-control bg-light @error('nomor_nota') is-invalid @enderror" id="nomor_nota" required readonly />
                    @error('nomor_nota')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="produk" class="form-label">Produk</label>
                    <select name="produk" class="form-select @error('produk') is-invalid @enderror" id="produk" required>
                        <option selected disabled>Pilih produk...</option>
                        @foreach ($produkData as $item)
                            <option value="{{ $item->id . '_' . (float) $item->harga }}">
                                {{ $item->nama }} - Rp {{ $item->harga }}
                            </option>
                        @endforeach
                    </select>
                    @error('produk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="pelanggan" class="form-label">Pelanggan</label>
                    <select name="pelanggan" class="form-select @error('pelanggan') is-invalid @enderror" id="pelanggan" required>
                        <option selected disabled>Pilih pelanggan...</option>
                        <option value="0">Umum</option>
                        @foreach ($pelangganData as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                    @error('pelanggan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <input name="jumlah" type="number" min="0" pattern="[0-9]" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" required />
                    @error('jumlah')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('pembelian.regenerate') }}" class="btn btn-outline-primary">Pindah Nota</a>
            </form>
        </div>
    </div>
    <hr class="my-2" />
    <h2 class="h4 mb-3">Detail Pembelian ({{ session('nomor_nota') }})</h2>
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
                    <td colspan="8">Tidak ada pembelian.</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
