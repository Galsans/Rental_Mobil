@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Edit Booking</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Booking</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Booking</h5>

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

                        <!-- Edit Booking Form -->
                        <form class="row g-3" action="{{ route('booking.update', $booking->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                {{-- <div class="form-floating">
                                    <select name="kendaraan_id" id="kendaraan_id" class="form-control">
                                        <option disabled>--Pilih Kendaraan--</option>
                                        @foreach ($kendaraans as $kendaraan)
                                            <option value="{{ $kendaraan->id }}"
                                                {{ $booking->kendaraan_id == $kendaraan->id ? 'selected' : '' }}>
                                                {{ $kendaraan->nama_kendaraan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="kendaraan_id">Kendaraan</label>
                                </div> --}}
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="name" value="{{ $booking->name }}" required
                                        class="form-control" id="name" placeholder="Name">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" name="email" value="{{ $booking->email }}" required
                                        class="form-control" id="email" placeholder="Email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nik" value="{{ $booking->nik }}" required
                                        class="form-control" id="nik" placeholder="NIK">
                                    <label for="nik">NIK</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="number" name="no_wa" value="{{ $booking->no_wa }}" required
                                        class="form-control" id="no_wa" placeholder="No WA">
                                    <label for="no_wa">No WA</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="tanggal_awal" value="{{ $booking->tanggal_awal }}"
                                        class="form-control" id="tanggal_awal" placeholder="Tanggal Peminjaman" required>
                                    <label for="tanggal_awal">Tanggal Peminjaman</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="tanggal_akhir" value="{{ $booking->tanggal_akhir }}"
                                        class="form-control" id="tanggal_akhir" placeholder="Tanggal Pengembalian" required>
                                    <label for="tanggal_akhir">Tanggal Pengembalian</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="alamat" value="{{ $booking->alamat }}" required
                                        class="form-control" id="alamat" placeholder="Alamat">
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <img src="{{ Storage::url($booking->ktp) }}" width="300" height="300"
                                        alt="">
                                    <input type="file" name="ktp" class="form-control" id="ktp"
                                        placeholder="KTP">
                                    <label for="ktp">KTP</label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </form>
                        <!-- End Edit Booking Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
