@extends('layout.app')

@section('content')
    <div class="pagetitle">
        <h1>Detail Kendaraan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kendaraan.index') }}">Kendaraan</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section vehicle-detail">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail Kendaraan</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ Storage::url($kendaraan->img) }}" alt="{{ $kendaraan->nama_kendaraan }}"
                                    class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Nama Kendaraan</th>
                                            <td>{{ $kendaraan->nama_kendaraan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori</th>
                                            <td>{{ $kendaraan->category->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Plat Nomor</th>
                                            <td>{{ $kendaraan->plat_nomor }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tahun</th>
                                            <td>{{ $kendaraan->tahun }}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga/hari</th>
                                            <td>Rp.{{ number_format($kendaraan->harga, 2, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>
                                                @if ($kendaraan->status == 'tersedia')
                                                    <span class="badge bg-primary">{{ $kendaraan->status }}</span>
                                                @elseif ($kendaraan->status == 'tidak tersedia')
                                                    <span class="badge bg-secondary">{{ $kendaraan->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td>{{ $kendaraan->deskripsi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('kendaraan.edit', $kendaraan->id) }}"
                                        class="btn btn-warning mt-3">Edit</a>
                                    <form action="{{ route('kendaraan.destroy', $kendaraan->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-3"
                                            onclick="return confirm('Are you sure you want to delete this kendaraan?');">Delete</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
