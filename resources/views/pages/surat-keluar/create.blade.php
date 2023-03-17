@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        {{-- Tombol kembali --}}
        <a href="{{ url()->previous() }}" title="Kembali" data-bs-toggle="tooltip" data-bs-placement="left"
           class="text-dark">
            <i class="bi bi-caret-left"></i>
        </a>
        TAMBAH SURAT KELUAR
    </h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('surat-keluar.store') }}" method="POST" class="form-body"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 py-4">
                        {{-- Input nomor surat --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="nomor_surat" class="form-label">Nomor Surat :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-list"></i>
                                </div>
                                <input name="nomor_surat" type="text" class="form-control ps-5"
                                       id="nomor_surat" placeholder="Nomor surat" autocomplete="off"
                                       value="{{ old('nomor_surat') }}" required>
                            </div>
                            @error('nomor_surat')
                            <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Tanggal surat --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_surat" class="form-label">Tanggal Surat :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input name="tanggal_surat" type="date" class="form-control ps-5"
                                       id="tanggal_surat" autocomplete="off"
                                       value="{{ old('tanggal_surat', now()->toDateString()) }}"
                                       required>
                            </div>
                            @error('tanggal_surat')
                            <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Penerima --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="penerima" class="form-label">Penerima :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input name="penerima" type="text" class="form-control ps-5" id="penerima"
                                       placeholder="Masukan penerima" autocomplete="off" value="{{ old('penerima') }}"
                                       required>
                            </div>
                            @error('penerima')
                            <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Tanggal dikirim --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_dikirim" class="form-label">Tanggal Dikirim :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input name="tanggal_dikirim" type="date" class="form-control ps-5"
                                       id="tanggal_dikirim" autocomplete="off"
                                       value="{{ old('tanggal_dikirim', now()->toDateString()) }}" required>
                            </div>
                            @error('tanggal_dikirim')
                            <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Perihal --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="perihal" class="form-label">Perihal :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-bookmark"></i>
                                </div>
                                <input name="perihal" type="text" class="form-control ps-5" id="perihal"
                                       placeholder="Masukan perihal" autocomplete="off" value="{{ old('perihal') }}"
                                       required>
                            </div>
                            @error('perihal')
                            <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input Pelaksana --}}
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label for="pelaksana" class="form-label">Pelaksana :</label>
                            <select name="pelaksana" id="pelaksana" class="form-select" aria-label="pelaksana">
                                @if (old('pelaksana') == 'BUMDesa Sari Amreta Sudha Sidakarya')
                                    <option value="BUMDesa Sari Amreta Sudha Sidakarya" selected>BUMDesa Sari Amreta
                                        Sudha Sidakarya
                                    </option>
                                @else
                                    <option selected hidden>Pilih Pelaksana</option>
                                    <option value="BUMDesa Sari Amreta Sudha Sidakarya">BUMDesa Sari Amreta Sudha
                                        Sidakarya
                                    </option>
                                @endif
                            </select>
                            @error('pelaksana')
                            <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="lampiran" class="form-label">Unggah Lampiran :</label>
                            <input name="lampiran[]" class="form-control" type="file" id="lampiran" multiple>
                        </div>
                    </div>
                    {{--                    --}}
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle d-inline-block mx-1"></i>
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
