@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        {{-- Tombol kembali --}}
        <a href="{{ url()->previous() }}" title="Kembali" data-bs-toggle="tooltip" data-bs-placement="left" class="text-dark">
            <i class="bi bi-caret-left"></i>
        </a>
        TAMBAH PENGGUNA
    </h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Form edit profile --}}
                <form action="{{ route('pengguna.store') }}" method="POST" class="form-body">
                    @csrf
                    <div class="row g-3 py-4">
                        {{-- Input username --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="username" class="form-label">Username :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input name="username" type="text" class="form-control ps-5" id="username"
                                    placeholder="Masukan username" autocomplete="off" value="{{ old('username') }}"
                                    required>
                            </div>
                            @error('username')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input nama lengkap --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="nama" class="form-label">Nama Lengkap :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-card-list"></i>
                                </div>
                                <input name="nama" type="text" class="form-control ps-5" id="nama"
                                    placeholder="Masukan nama lengkap" autocomplete="off" value="{{ old('nama') }}"
                                    required>
                            </div>
                            @error('nama')
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
                                    placeholder="Masukan alamat email" autocomplete="off" value="{{ old('email') }}"
                                    required>
                            </div>
                            @error('email')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input telepon --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="telepon" class="form-label">Nomor Telepon :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-phone"></i>
                                </div>
                                <input name="telepon" type="number" class="form-control ps-5" id="telepon"
                                    placeholder="Masukan nomor telepon" autocomplete="off" value="{{ old('telepon') }}"
                                    required>
                            </div>
                            @error('telepon')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input password --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="w-100 d-flex justify-content-between">
                                <label for="password" class="form-label">Password :</label>
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
                                    placeholder="Masukan password" autocomplete="off" required>
                            </div>
                            @error('password')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input password confirmation --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="w-100 d-flex justify-content-between">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password :</label>
                                <div class="form-check form-switch">
                                    <input name="togglePasswordConfirmation" class="form-check-input" type="checkbox"
                                        tabindex="-1" id="togglePasswordConfirmation">
                                    <label class="form-check-label user-select-none"
                                        for="togglePasswordConfirmation">Show</label>
                                </div>
                            </div>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-lock"></i>
                                </div>
                                <input name="password_confirmation" type="password" class="form-control ps-5"
                                    id="password_confirmation" placeholder="Masukan password" autocomplete="off"
                                    required>
                            </div>
                            @error('password')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input jenis pengguna --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="id_jenis_pengguna" class="form-label">Jenis Pengguna :</label>
                            <select name="id_jenis_pengguna" id="id_jenis_pengguna" class="form-select"
                                aria-label="Jenis pengguna">
                                @foreach ($jenisPengguna as $j)
                                    @if (old('id_jenis_pengguna'))
                                        <option value="{{ $j->id_jenis_pengguna }}"
                                            {{ old('id_jenis_pengguna') == $j->id_jenis_pengguna ? 'selected' : '' }}>
                                            {{ $j->nama }}</option>
                                    @else
                                        <option selected hidden>Pilih jenis pengguna</option>
                                        <option value="{{ $j->id_jenis_pengguna }}">{{ $j->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_jenis_pengguna')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle d-inline-block mx-1"></i>
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    @push('afterScripts')
        <script src="{{ asset('assets/js/toggle.password.js') }}"></script>
    @endpush
@endsection
