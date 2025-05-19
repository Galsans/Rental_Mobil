@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Booking</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Booking</li>
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
                        <h5 class="card-title">Booking</h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Unik</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Kendaraan</th>
                                    <th>Harga/hari</th>
                                    <th>Status Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($book as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_unik }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->kendaraan->nama_kendaraan }}</td>
                                        <td>Rp.{{ number_format($item->kendaraan->harga, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($item->status_payment == 'sudah bayar')
                                                <span class="badge bg-primary">{{ $item->status_payment }}</span>
                                            @elseif ($item->status_payment == 'belum bayar')
                                                <span class="badge bg-secondary">{{ $item->status_payment }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('booking.show', $item->id) }}" class="btn btn-sm btn-info"><i
                                                    class="bi bi-search"></i> Detail</a>
                                            <a href="{{ route('booking.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <form action="{{ route('booking.destroy', $item->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this booking?');">
                                                    <i class="bi bi-trash-fill"></i> Delete
                                                </button>
                                            </form>
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
