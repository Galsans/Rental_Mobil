@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Detail Booking</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('booking.index') }}">Booking</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Booking</h5>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="kendaraan_name"
                                        value="{{ $book->kendaraan->nama_kendaraan }}" readonly>
                                    <label for="kendaraan_name">Nama Kendaraan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="user_name" value="{{ $book->name }}"
                                        readonly>
                                    <label for="user_name">Nama Pemesan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" value="{{ $book->email }}"
                                        readonly>
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="no_wa" value="{{ $book->no_wa }}"
                                        readonly>
                                    <label for="no_wa">No WA</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nik" value="{{ $book->nik }}"
                                        readonly>
                                    <label for="nik">NIK</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="alamat" value="{{ $book->alamat }}"
                                        readonly>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="tanggal_awal"
                                        value="{{ $book->tanggal_awal }}" readonly>
                                    <label for="tanggal_awal">Tanggal Peminjaman</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="tanggal_akhir"
                                        value="{{ $book->tanggal_akhir }}" readonly>
                                    <label for="tanggal_akhir">Tanggal Pengembalian</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="tanggal_awal"
                                        value="{{ $book->status_payment }}" readonly>
                                    <label for="tanggal_awal">Status Pembayaran</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="total_pembayaran"
                                        value="Rp.{{ number_format($total_pembayaran, 2, ',', '.') }}" readonly>
                                    <label for="total_pembayaran">Total Pembayaran</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="ktp" class="form-label">Foto KTP</label>
                                    <div>
                                        <img src="{{ Storage::url($book->ktp) }}" width="100%" height="auto"
                                            alt="Foto KTP" class="img-fluid rounded shadow-sm">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('booking.book') }}" class="btn btn-primary">Back to Booking List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
