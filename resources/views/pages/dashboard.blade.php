@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        <i class="bi bi-house"></i>
        DASHBOARD
    </h2>

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-3">
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>Surat Masuk</p>
                                <h4 class="">{{ $count['suratMasuk'] }}</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-success"><i class="bi bi-arrow-down"></i></p>
                                <div id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>Surat Keluar</p>
                                <h4 class="">{{ $count['suratKeluar'] }}</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-primary"><i class="bi bi-arrow-up"></i></p>
                                <div id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>Pengguna</p>
                                <h4 class="">{{ $count['pengguna'] }}</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-dark"><i class="bi bi-person"></i></p>
                                <div id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>Data 4</p>
                                <h4 class="">25.8K</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-success">+ 8.2% <i class="bi bi-arrow-up"></i></p>
                                <div id="chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
