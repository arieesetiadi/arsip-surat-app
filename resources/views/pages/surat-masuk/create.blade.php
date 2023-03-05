@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        {{-- Tombol kembali --}}
        <a href="{{ url()->previous() }}" title="Kembali" data-bs-toggle="tooltip" data-bs-placement="left" class="text-dark">
            <i class="bi bi-caret-left"></i>
        </a>
        TAMBAH SURAT MASUK
    </h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                {{-- Form edit profile --}}
                <form action="{{ route('surat-masuk.store') }}" method="POST" class="form-body" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 py-4">
                        {{-- Input nomor urut surat --}}
                        {{-- <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="nomor_urut" class="form-label">Nomor Urut :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-list"></i>
                                </div>
                                <input name="nomor_urut" type="text" class="form-control ps-5" id="nomor_urut"
                                    placeholder="Nomor urut surat" autocomplete="off" value="{{ old('nomor_urut', generateNomorUrut()) }}"
                                    required disabled aria-disabled="true">
                            </div>
                            @error('nomor_urut')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        {{-- Input nomor surat asal --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="nomor_surat_asal" class="form-label">Nomor Surat Asal :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-list"></i>
                                </div>
                                <input name="nomor_surat_asal" type="text" class="form-control ps-5"
                                    id="nomor_surat_asal" placeholder="Nomor surat asal" autocomplete="off"
                                    value="{{ old('nomor_surat_asal') }}" required>
                            </div>
                            @error('nomor_surat_asal')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Tanggal surat asal --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_surat_asal" class="form-label">Tanggal Surat Asal :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input name="tanggal_surat_asal" type="date" class="form-control ps-5"
                                    id="tanggal_surat_asal" autocomplete="off" value="{{ old('tanggal_surat_asal', now()->toDateString()) }}"
                                    required>
                            </div>
                            @error('tanggal_surat_asal')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Pengirim --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="pengirim" class="form-label">Pengirim :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input name="pengirim" type="text" class="form-control ps-5" id="pengirim"
                                    placeholder="Masukan pengirim" autocomplete="off" value="{{ old('pengirim') }}"
                                    required>
                            </div>
                            @error('pengirim')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Tanggal diterima --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_diterima" class="form-label">Tanggal Diterima :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input name="tanggal_diterima" type="date" class="form-control ps-5"
                                    id="tanggal_diterima" autocomplete="off" value="{{ old('tanggal_diterima', now()->toDateString()) }}" required>
                            </div>
                            @error('tanggal_diterima')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Penerima --}}
                        {{-- <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="penerima" class="form-label">Penerima :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input name="penerima" type="text" class="form-control ps-5" id="penerima"
                                    placeholder="Masukan penerima" autocomplete="off" value="{{ old('penerima', pengguna()->nama) }}"
                                    required disabled aria-disabled="true">
                            </div>
                            @error('penerima')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div> --}}

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

                        {{-- Input Status --}}
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label for="status" class="form-label">Status :</label>
                            <select name="status" id="status" class="form-select" aria-label="Status">
                                @if (old('status') == 'Asli')
                                    <option value="Asli" selected>Asli</option>
                                    <option value="Tembusan">Tembusan</option>
                                @elseif (old('status') == 'Tembusan')
                                    <option value="Asli">Asli</option>
                                    <option value="Tembusan" selected>Tembusan</option>
                                @else
                                    <option selected hidden>Pilih Status</option>
                                    <option value="Asli">Asli</option>
                                    <option value="Tembusan">Tembusan</option>
                                @endif
                            </select>
                            @error('status')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Input Sifat --}}
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label for="sifat" class="form-label">Sifat :</label>
                            <select name="sifat" id="sifat" class="form-select" aria-label="Sifat">
                                @if (old('sifat') == 'Segera')
                                    <option value="Segera" selected>Segera</option>
                                    <option value="Sangat Segera">Sangat Segera</option>
                                    <option value="Kilat">Kilat</option>
                                @elseif (old('sifat') == 'Sangat Segera')
                                    <option value="Segera">Segera</option>
                                    <option value="Sangat Segera" selected>Sangat Segera</option>
                                    <option value="Kilat">Kilat</option>
                                @elseif (old('sifat') == 'Kilat')
                                    <option value="Segera">Segera</option>
                                    <option value="Sangat Segera">Sangat Segera</option>
                                    <option value="Kilat" selected>Kilat</option>
                                @else
                                    <option selected hidden>Pilih Sifat</option>
                                    <option value="Segera">Segera</option>
                                    <option value="Sangat Segera">Sangat Segera</option>
                                    <option value="Kilat">Kilat</option>
                                @endif
                            </select>
                            @error('sifat')
                                <small class="text-danger d-inline-block mt-2">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="lampiran" class="form-label">Unggah Lampiran :</label>
                            <input name="lampiran[]" class="form-control" type="file" id="lampiran" multiple>
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
