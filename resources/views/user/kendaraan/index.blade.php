@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Kendaraan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Kendaraan</li>
                <li class="breadcrumb-item active">Lihat Data</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Kendaraan</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Plat Nomor</th>
                                    <th>Harga/hari</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kendaraan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_kendaraan }}</td>
                                        <td>{{ $item->plat_nomor }}</td>
                                        <td>Rp.{{ number_format($item->harga, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($item->status == 'tersedia')
                                                <span class="badge bg-primary">{{ $item->status }}</span>
                                            @elseif ($item->status == 'tidak tersedia')
                                                <span class="badge bg-secondary">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('booking.create', $item->id) }}"
                                                class="btn btn-sm btn-secondary {{ $item->status == 'tidak tersedia' ? 'disabled' : '' }}">
                                                <i class="bi bi-ticket-detailed"></i> Booking
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
