@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Detail Peminjam</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.booking.index') }}">Booking</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section peminjam-detail">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Peminjam</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Nama</th>
                                            <td>{{ $booking->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $booking->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th>
                                            <td>{{ $booking->no_wa }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $booking->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Foto KTP</th>
                                            <td><img src="{{ Storage::url($booking->ktp) }}" width="300" alt="">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Kendaraan yang Dipinjam</h5>
                                <div class="card mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="{{ Storage::url($booking->kendaraan->img) }}"
                                                alt="{{ $booking->kendaraan->nama_kendaraan }}" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $booking->kendaraan->nama_kendaraan }}</h5>
                                                <p class="card-text">Plat Nomor: {{ $booking->kendaraan->plat_nomor }}
                                                </p>
                                                <p class="card-text">Tanggal Booking: {{ $booking->tanggal_awal }}
                                                </p>
                                                <p class="card-text">Tanggal Pengembalian: {{ $booking->tanggal_akhir }}
                                                </p>
                                                <p class="card-text">Total Hari: {{ $total_hari }} hari
                                                </p>
                                                <p class="card-text">Total Pembayaran: Rp.
                                                    {{ number_format($total_pembayaran, 2, ',', '.') }}
                                                </p>

                                                <p class="card-text">Status Kendaraan:
                                                    @if ($booking->kendaraan->status == 'tidak tersedia')
                                                        <span class="badge bg-secondary">Booked</span>
                                                    @endif
                                                </p>
                                                <p class="card-text">Status Pembayaran:
                                                    @if ($booking->status_payment == 'belum bayar')
                                                        <span
                                                            class="badge bg-secondary">{{ $booking->status_payment }}</span>
                                                    @elseif ($booking->status_payment == 'sudah bayar')
                                                        <span
                                                            class="badge bg-primary">{{ $booking->status_payment }}</span>
                                                    @endif
                                                </p>
                                                <a href="{{ route('kendaraan.show', $booking->kendaraan->id) }}"
                                                    class="btn btn-info">Detail Kendaraan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                                {{-- @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('peminjams.edit', $peminjam->id) }}"
                                        class="btn btn-warning mt-3">Edit</a>
                                    <form action="{{ route('peminjams.destroy', $peminjam->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-3"
                                            onclick="return confirm('Are you sure you want to delete this peminjam?');">Delete</button>
                                    </form>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
