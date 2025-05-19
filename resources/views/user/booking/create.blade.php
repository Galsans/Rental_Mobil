@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Booking Kendaraan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kendaraan.index') }}">Kendaraan</a></li>
                <li class="breadcrumb-item active">Booking</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Booking Kendaraan</h5>

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

                        <!-- Booking Form -->
                        <form class="row g-3" action="{{ route('booking.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="kendaraan_id" value="{{ $kendaraan->id }}">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                                    <label for="name">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email" value="{{ old('email') }}" required>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="no_wa" class="form-control" id="no_wa"
                                        placeholder="No WA" value="{{ old('no_wa') }}" required>
                                    <label for="no_wa">No WA</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nik" class="form-control" id="nik"
                                        placeholder="NIK" value="{{ old('nik') }}" required>
                                    <label for="nik">NIK</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" name="ktp" class="form-control" id="ktp"
                                        placeholder="Upload KTP" required>
                                    <label for="ktp">Upload KTP</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal"
                                        placeholder="Tanggal Peminjaman" required>
                                    <label for="tanggal_awal">Tanggal Peminjaman</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir"
                                        placeholder="Tanggal Pengembalian" required>
                                    <label for="tanggal_akhir">Tanggal Pengembalian</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <!-- End Booking Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
