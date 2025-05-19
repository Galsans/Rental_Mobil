@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Kendaraan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Kendaraan</li>
                <li class="breadcrumb-item active">Update Data</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Kendaraan</h5>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nama_kendaraan"
                                        value="{{ old('nama_kendaraan', $kendaraan->nama_kendaraan) }}" required
                                        class="form-control" id="nama_kendaraan" placeholder="Nama Kendaraan">
                                    <label for="nama_kendaraan">Nama Kendaraan</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea name="deskripsi" required class="form-control" id="deskripsi" placeholder="Deskripsi">{{ old('deskripsi', $kendaraan->deskripsi) }}</textarea>
                                    <label for="deskripsi">Deskripsi</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option disabled>--Pilih Category--</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('category_id', $kendaraan->category_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="category_id">Category</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="plat_nomor"
                                        value="{{ old('plat_nomor', $kendaraan->plat_nomor) }}" required
                                        class="form-control" id="plat_nomor" placeholder="Plat Nomor Kendaraan">
                                    <label for="plat_nomor">Plat Nomor</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="tahun" value="{{ old('tahun', $kendaraan->tahun) }}"
                                        required class="form-control" id="tahun" placeholder="Tahun">
                                    <label for="tahun">Tahun</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="harga" value="{{ old('harga', $kendaraan->harga) }}"
                                        required class="form-control" id="harga" placeholder="Harga">
                                    <label for="harga">Harga/hari</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select name="status" id="status" class="form-control">
                                        <option disabled>--Pilih Status--</option>
                                        <option value="tersedia"
                                            {{ old('status', $kendaraan->status) == 'tersedia' ? 'selected' : '' }}>
                                            Tersedia</option>
                                        <option value="tidak tersedia"
                                            {{ old('status', $kendaraan->status) == 'tidak tersedia' ? 'selected' : '' }}>
                                            Tidak Tersedia
                                        </option>
                                    </select>
                                    <label for="status">Status</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <img src="{{ Storage::url($kendaraan->img) }}" width="300" height="300"
                                        class="text-center" alt="">
                                    <input type="file" name="img" class="form-control" id="img"
                                        placeholder="Gambar Kendaraan">
                                    <label for="img">Gambar Kendaraan</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
