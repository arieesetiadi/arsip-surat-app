@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        <i class="bi bi-house"></i>
        DASHBOARD
    </h2>

    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
            <div class="col">
                <div class="card overflow-hidden radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-stretch justify-content-between overflow-hidden">
                            <div class="w-50">
                                <p>Data 1</p>
                                <h4 class="">8,542</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-success">+ 16% <i class="bi bi-arrow-up"></i></p>
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
                                <p>Data 2</p>
                                <h4 class="">12.5M</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-danger">- 3.4% <i class="bi bi-arrow-down"></i></p>
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
                                <p>Data 3</p>
                                <h4 class="">64.5K</h4>
                            </div>
                            <div class="w-50">
                                <p class="mb-3 float-end text-success">+ 24% <i class="bi bi-arrow-up"></i></p>
                                <div id="chart3"></div>
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
            </div>
        </div>
    </div>
@endsection
