@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        {{-- Tombol kembali --}}
        <a href="{{ url()->previous() }}" title="Kembali" data-bs-toggle="tooltip" data-bs-placement="left" class="text-dark">
            <i class="bi bi-caret-left"></i>
        </a>
        DETAIL SURAT MASUK
    </h2>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form>
                    @csrf
                    <div class="row g-3 py-4">
                        {{-- Nomor urut --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="nomor_surat_asal" class="form-label">Nomor Urut :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-list"></i>
                                </div>
                                <input type="text" class="form-control ps-5" value="{{ $suratMasuk->nomor_urut }}"
                                    disabled>
                            </div>
                        </div>

                        {{-- Nomor surat asal --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="nomor_surat_asal" class="form-label">Nomor Surat Asal :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-list"></i>
                                </div>
                                <input type="text" class="form-control ps-5" value="{{ $suratMasuk->nomor_surat_asal }}"
                                    disabled>
                            </div>
                        </div>

                        {{-- Tanggal surat asal --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_surat_asal" class="form-label">Tanggal Surat Asal :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input type="date" class="form-control ps-5"
                                    value="{{ formDateFormat($suratMasuk->tanggal_surat_asal) }}" disabled>
                            </div>
                        </div>

                        {{-- Tanggal diterima --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="tanggal_diterima" class="form-label">Tanggal Diterima :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-calendar"></i>
                                </div>
                                <input type="date" class="form-control ps-5"
                                    value="{{ formDateFormat($suratMasuk->tanggal_diterima) }}" disabled>
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
                                    value="{{ $suratMasuk->pengirim }}" disabled>
                            </div>
                        </div>

                        {{-- Penerima --}}
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <label for="penerima" class="form-label">Penerima :</label>
                            <div class="ms-auto position-relative">
                                <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                                    <i class="bi bi-person"></i>
                                </div>
                                <input type="text" class="form-control ps-5" value="{{ $suratMasuk->penerima }}"
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
                                <input type="text" class="form-control ps-5" value="{{ $suratMasuk->perihal }}" disabled>
                            </div>
                        </div>

                        {{-- Status --}}
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label for="status" class="form-label">Status :</label>
                            <select class="form-select" aria-label="Status" disabled>
                                <option selected>{{ $suratMasuk->status }}</option>
                            </select>
                        </div>

                        {{-- Sifat --}}
                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <label for="sifat" class="form-label">Sifat :</label>
                            <select name="sifat" id="sifat" class="form-select" aria-label="Sifat" disabled>
                                <option selected>{{ $suratMasuk->sifat }}</option>
                            </select>
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
                                @forelse ($suratMasuk->lampiran as $i => $lampiran)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $lampiran->nama }}</td>
                                        <td>{{ humanDateFormat($suratMasuk->tanggal_diterima) }}</td>
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
