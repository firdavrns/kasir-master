@extends('partials.app')

@section('content')
    <h1>Laporan</h1>
    <hr class="my-2" />
    <div class="card my-3">
        <div class="card-body">
            <form action="{{ route('laporan.process') }}" method="GET">
                <div class="mb-2">
                    <label for="tahun" class="form-label">Tahun</label>
                    <select name="tahun" class="form-select @error('tahun') is-invalid @enderror" id="tahun">
                        <option selected disabled>Pilih tahun...</option>
                        <option value="2024">2024</option>
                    </select>
                    @error('tahun')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bulan" class="form-label">Bulan</label>
                    <select name="bulan" class="form-select @error('bulan') is-invalid @enderror" id="bulan">
                        <option selected disabled>Pilih bulan...</option>
                        @foreach ($bulan as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                    @error('bulan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Cetak</button>
            </form>
        </div>
    </div>
@endsection
