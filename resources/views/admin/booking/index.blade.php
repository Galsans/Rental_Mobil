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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


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
                                    <th>Nama Kendaraan</th>
                                    <th>Kode Unik</th>
                                    <th>Plat Nomor</th>
                                    <th>Nama Peminjam</th>
                                    <th>No Whatsapp</th>
                                    <th>Harga/hari</th>
                                    <th>Status Pembayaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booking as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kendaraan->nama_kendaraan }}</td>
                                        <td>{{ $item->kode_unik }}</td>
                                        <td>{{ $item->kendaraan->plat_nomor }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->no_wa }}</td>
                                        <td>Rp.{{ number_format($item->kendaraan->harga, 2, ',', '.') }}</td>
                                        <td>
                                            @if ($item->status_payment == 'sudah bayar')
                                                <span class="badge bg-primary">{{ $item->status_payment }}</span>
                                            @elseif ($item->status_payment == 'belum bayar')
                                                <span class="badge bg-secondary">{{ $item->status_payment }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.booking.show', $item->id) }}"
                                                class="btn btn-sm btn-info"><i class="bi bi-search"></i> Detail</a>
                                            @if ($item->status_payment == 'belum bayar')
                                                <form action="{{ route('admin.booking.confirm', $item->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                        onclick="return confirm('Are you sure you want to confirm this payment?');">
                                                        <i class="bi bi-pencil-square"></i> Confirm
                                                    </button>
                                                </form>
                                            @elseif ($item->status_payment == 'sudah bayar')
                                                <form action="{{ route('admin.booking.batal', $item->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-secondary"
                                                        onclick="return confirm('Are you sure you want to confirm this payment?');">
                                                        <i class="bi bi-pencil-square"></i> Batalkan
                                                    </button>
                                                </form>
                                            @endif
                                            @if ($item->isOverdue())
                                                <form action="{{ route('admin.booking.destroy', $booking->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this booking?');">
                                                        Delete Booking
                                                    </button>
                                                </form>
                                            @else
                                                <p class="text-muted">Booking cannot be deleted before the return date has
                                                    passed.</p>
                                            @endif
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
