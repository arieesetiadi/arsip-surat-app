@extends('layouts.main')

@section('content')
    {{-- Tampilkan alert jika ada --}}
    @include('components.alert')

    <h2 class="mb-4 d-flex justify-content-between">
        <div>
            <i class="bi bi-arrow-down-circle"></i>
            SURAT MASUK
        </div>

        {{-- Tombol tambah surat masuk --}}
        <a href="{{ route('surat-masuk.create') }}" title="Tambah Surat Masuk" data-bs-toggle="tooltip" data-bs-placement="left"
            class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Surat Masuk
        </a>
    </h2>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-lg table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nomor Surat Asal</th>
                        <th>Tanggal Diterima</th>
                        <th>Pengirim</th>
                        <th>Perihal</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suratMasuk as $sm)
                        <tr>
                            <td>{{ $sm->nomor_urut }}</td>
                            <td>{{ $sm->nomor_surat_asal }}</td>
                            <td>{{ humanDateFormat($sm->tanggal_diterima) }}</td>
                            <td>{{ $sm->pengirim }}</td>
                            <td>{{ $sm->perihal }}</td>
                            <td>
                                {{-- Tombol detail --}}
                                <a href="{{ route('surat-masuk.show', $sm->id_surat_masuk) }}" title="Detail Surat" data-bs-toggle="tooltip" data-bs-placement="right"
                                    class="btn btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Tombol cetak --}}
                                <a href="#" title="Cetak Surat" data-bs-toggle="tooltip" data-bs-placement="right"
                                    class="btn btn-sm">
                                    <i class="bi bi-printer"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @push('afterScripts')
        <script>
            function swalConfirm(targetId, message) {
                const target = document.getElementById(targetId);
                Swal.fire({
                    title: 'Konfirmasi',
                    text: message,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Lanjutkan'
                }).then((result) => {
                    if (result.isConfirmed) {
                        target.submit();
                    }
                })
            }
        </script>
    @endpush
@endsection
