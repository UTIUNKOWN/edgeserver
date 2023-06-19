@extends('layouts.main')

@section('container')
    @include('partials.sidebar')
    <section class="home-section">
        <h4 class="pt-3 text-center">TAMBAH TEMPAT SAMPAH</h4>
        <hr>
        <form method="post" action="/dashboard" class="col-lg-8 justify-content-center mx-auto">
            @csrf
            <div class="mb-3">
                <label for="node_number" class="form-label">Node Sampah</label>
                <input type="number" class="form-control  @error('node_number') is-invalid @enderror" id="node_number"
                    aria-describedby="node_number" required name="node_number" value="{{ old('node_number') }}">
                @error('node_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Lokasi Sampah</label>
                <input type="text" class="form-control  @error('location') is-invalid @enderror" id="location"
                    aria-describedby="location" required name="location" value="{{ old('location') }}">
                @error('location')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="maps" class="form-label">Link Google Maps</label>
                <input type="url" class="form-control @error('maps') is-invalid @enderror" id="maps"
                    aria-describedby="maps" required required name="maps" value="{{ old('maps') }}">
                @error('maps')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInput" class="form-label">Lingkup Pemantauan</label>
                <select class="form-select" aria-label="Default select example" name="lingkup">
                    <option value="Lab Telekomunikasi">Lab Telekomunikasi</option>
                    <option value="Gedung Magister">Gedung Magister</option>
                    <option value="Gedung Sekolah B">Gedung Sekolah B</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tambahkan Tempat Sampah</button>
        </form>
    </section>
@endsection
