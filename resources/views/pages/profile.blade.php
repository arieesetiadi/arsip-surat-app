@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        <i class="bi bi-person"></i>
        Profile
    </h2>

    <div class="container-fluid">
        <div class="row">
            {{-- Left section --}}
            <div class="col-sm-12 col-md-6 col-lg-5 p-4">
                <center>
                    <img src="{{ asset('assets/images/icons/profile.png') }}" alt="Profile Picture" width="200"
                        class="img-fluid img-thumbnail rounded-circle my-4">
                    <h5>
                        {{ auth()->user()->name }}
                    </h5>
                    <hr>
                    <span>
                        <i class="bi bi-envelope"></i>
                        {{ auth()->user()->email }}
                    </span>
                </center>
            </div>

            {{-- Right section --}}
            <div class="col-sm-12 col-md-6 col-lg-7 p-4">
                {{-- Tampilkan pesan sukses --}}
                @include('components.alert')

                <h6>
                    <i class="bi bi-gear text-dark"></i>
                    Pengaturan Profile
                </h6>

                {{-- Form edit profile --}}
                <form action="{{ route('updateProfile') }}" method="POST" class="form-body">
                    @csrf
                    @method('PUT')
                    <div class="row g-3 py-4">
                        {{-- Input username --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="username" class="form-label">Username :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input name="username" type="text" class="form-control ps-5" id="username"
                                    placeholder="Masukan username" autocomplete="off"
                                    value="{{ old('username', auth()->user()->username) }}" required>
                            </div>
                            @error('username')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input nama lengkap --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="name" class="form-label">Nama Lengkap :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-card-list"></i>
                                </div>
                                <input name="name" type="text" class="form-control ps-5" id="name"
                                    placeholder="Masukan nama lengkap" autocomplete="off"
                                    value="{{ old('name', auth()->user()->name) }}" required>
                            </div>
                            @error('name')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input email --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="email" class="form-label">Email :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-envelope"></i>
                                </div>
                                <input name="email" type="email" class="form-control ps-5" id="email"
                                    placeholder="Masukan alamat email" autocomplete="off"
                                    value="{{ old('email', auth()->user()->email) }}" required>
                            </div>
                            @error('email')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input telepon --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="phone" class="form-label">Nomor Telepon :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-phone"></i>
                                </div>
                                <input name="phone" type="number" class="form-control ps-5" id="phone"
                                    placeholder="Masukan nama lengkap" autocomplete="off"
                                    value="{{ old('phone', auth()->user()->phone) }}" required>
                            </div>
                            @error('phone')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input password --}}
                        <div class="col-12">
                            <div class="w-100 d-flex justify-content-between">
                                <label for="password" class="form-label">Password (Optional) :</label>
                                <div class="form-check form-switch">
                                    <input name="togglePassword" class="form-check-input" type="checkbox" tabindex="-1"
                                        id="togglePassword">
                                    <label class="form-check-label user-select-none" for="togglePassword">Show</label>
                                </div>
                            </div>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-lock"></i>
                                </div>
                                <input name="password" type="password" class="form-control ps-5" id="password"
                                    placeholder="Masukan password" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
