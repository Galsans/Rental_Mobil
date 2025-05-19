@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span>Kamu login sebagai {{ Auth::user()->role }}</span>
                </div>
            </div>

            <div class="col-12 d-flex flex-wrap gap-5">
                <!-- Sales Card -->
                <div class="col-md-3 col-md-3">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Category </h5>

                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>Jumlah Category: {{ $category->count() }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-md-3 col-md-3">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Kendaraan</h5>

                            <div class="d-flex align-items-center">
                                <div class="ps-3">
                                    <h6>Jumlah Kendaraan: {{ $kendaraan->where('status', 'tersedia')->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->role == 'admin')
                    <div class="col-md-3 col-md-3">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">User</h5>

                                <div class="d-flex align-items-center">
                                    <div class="ps-3">
                                        <h6>Jumlah User: {{ $user->count() }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
