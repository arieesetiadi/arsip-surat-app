@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        {{-- Tombol kembali --}}
        <a href="{{ url()->previous() }}" title="Kembali" data-bs-toggle="tooltip" data-bs-placement="left" class="text-dark">
            <i class="bi bi-caret-left"></i>
        </a>
        DETAIL - {{ $user->name }}
    </h2>

    <div class="container-fluid">
        <div class="row">
            {{-- Left section --}}
            <div class="col-sm-12 col-lg-4 p-4">
                <center>
                    <img src="{{ asset('assets/images/icons/profile.png') }}" alt="Profile Picture" width="200"
                        class="img-fluid img-thumbnail rounded-circle my-4">
                </center>
            </div>

            {{-- Right section --}}
            <div class="col-sm-12 col-lg-8 p-4">
                <h6>
                    <i class="bi bi-person text-dark"></i>
                    Detail Pengguna
                </h6>

                <div class="row g-3 py-4">
                    {{-- Input username --}}
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <label for="username" class="form-label">Username :</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <i class="bi bi-person"></i>
                            </div>
                            <input type="text" class="form-control ps-5" value="{{ old('username', $user->username) }}"
                                required disabled>
                        </div>
                    </div>

                    {{-- Input nama lengkap --}}
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <label for="name" class="form-label">Nama Lengkap :</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <i class="bi bi-card-list"></i>
                            </div>
                            <input type="text" class="form-control ps-5" value="{{ old('name', $user->name) }}" required
                                disabled>
                        </div>
                    </div>

                    {{-- Input email --}}
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <label for="email" class="form-label">Email :</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <input type="email" class="form-control ps-5" value="{{ old('email', $user->email) }}"
                                required disabled>
                        </div>
                    </div>

                    {{-- Input telepon --}}
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <label for="phone" class="form-label">Nomor Telepon :</label>
                        <div class="ms-auto position-relative">
                            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                <i class="bi bi-phone"></i>
                            </div>
                            <input type="text" class="form-control ps-5" value="{{ old('phone', $user->phone) }}"
                                required disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
