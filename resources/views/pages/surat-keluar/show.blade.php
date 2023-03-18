@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        {{-- Tombol kembali --}}
        <a href="{{ url()->previous() }}" title="Kembali" data-bs-toggle="tooltip" data-bs-placement="left" class="text-dark">
            <i class="bi bi-caret-left"></i>
        </a>
        DETAIL SURAT KELUAR
    </h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form>
                    @csrf
                    <div class="row g-3 py-4">
                        {{-- Nomor urut --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label class="form-label">Nomor Urut :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-list"></i>
                                </div>
                                <input type="text" class="form-control ps-5" value="{{ $suratKeluar->nomor_urut }}"
                                    disabled>
                            </div>
                        </div>

                        {{-- Nomor surat --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label class="form-label">Nomor Surat :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-list"></i>
                                </div>
                                <input type="text" class="form-control ps-5" value="{{ $suratKeluar->nomor_surat }}"
                                    disabled>
                            </div>
                        </div>

                        {{-- Tanggal surat --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_surat" class="form-label">Tanggal Surat :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input type="date" class="form-control ps-5"
                                    value="{{ formDateFormat($suratKeluar->tanggal_surat) }}" disabled>
                            </div>
                        </div>

                          {{-- Pengirim --}}
                          <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="pengirim" class="form-label">Pengirim :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input type="text" class="form-control ps-5" id="pengirim"
                                    value="{{ $suratKeluar->pengirim }}" disabled>
                            </div>
                        </div>

                        {{-- Penerima --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="penerima" class="form-label">Penerima :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input type="text" class="form-control ps-5" value="{{ $suratKeluar->penerima }}"
                                    disabled>
                            </div>
                        </div>

                        {{-- Perihal --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="perihal" class="form-label">Perihal :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-bookmark"></i>
                                </div>
                                <input type="text" class="form-control ps-5" value="{{ $suratKeluar->perihal }}" disabled>
                            </div>
                        </div>

                        {{-- Pelaksana --}}
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label for="pelaksana" class="form-label">Pelaksana :</label>
                            <select class="form-select" aria-label="pelaksana" disabled>
                                <option selected>{{ $suratKeluar->pelaksana }}</option>
                            </select>
                        </div>

                        {{-- Bagian --}}
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label for="bagian" class="form-label">Bagian :</label>
                            <select class="form-select" aria-label="bagian" disabled>
                                <option selected>{{ $suratKeluar->bagian }}</option>
                            </select>
                        </div>

                        {{-- Tanggal Dikirim --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_dikirim" class="form-label">Tanggal Dikirim :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input type="date" class="form-control ps-5"
                                    value="{{ formDateFormat($suratKeluar->tanggal_dikirim) }}" disabled>
                            </div>
                        </div>

                        <hr>

                        {{-- Lampiran --}}
                        <div class="col-12">
                            <label for="sifat" class="form-label">Lampiran :</label>
                            <table class="table table-lg table-striped table-bordered">
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lampiran</th>
                                    <th>Tanggal Lampiran</th>
                                    <th>
                                        <center>Pilihan</center>
                                    </th>
                                </tr>
                                @forelse ($suratKeluar->lampiran as $i => $lampiran)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $lampiran->nama }}</td>
                                        <td>{{ humanDateFormat($suratKeluar->tanggal_dikirim) }}</td>
                                        <td>
                                            <center>
                                                {{-- Tombol preview --}}
                                                <a href="{{ asset('assets/uploads/lampiran/' . $lampiran->nama) }}"
                                                    target="_blank" title="Preview lampiran" data-bs-toggle="tooltip"
                                                    data-bs-placement="right" class="btn btn-sm btn-primary">
                                                    <i class="bi bi-eye"></i> Preview
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-3">Lampiran tidak tersedia.</td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('afterScripts')
        <script src="{{ asset('assets/js/toggle.password.js') }}"></script>
    @endpush
@endsection
