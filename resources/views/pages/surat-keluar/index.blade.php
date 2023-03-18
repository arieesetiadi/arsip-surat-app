@extends('layouts.main')

@section('content')
    {{-- Tampilkan alert jika ada --}}
    @include('components.alert')

    <h2 class="mb-4 d-flex justify-content-between">
        <div>
            <i class="bi bi-arrow-up-circle"></i>
            SURAT KELUAR
        </div>

        {{-- Tombol tambah surat keluar --}}
        <a href="{{ route('surat-keluar.create') }}" title="Tambah Surat Keluar" data-bs-toggle="tooltip"
            data-bs-placement="left" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Surat Keluar
        </a>
    </h2>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-lg table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Penerima</th>
                        <th>Bagian</th>
                        <th>Pelaksana</th>
                        <th>Perihal</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suratKeluar as $sk)
                        <tr>
                            <td>{{ $sk->nomor_urut }}</td>
                            <td>{{ $sk->nomor_surat }}</td>
                            <td>{{ humanDateFormat($sk->tanggal_surat) }}</td>
                            <td>{{ $sk->penerima }}</td>
                            <td>{{ $sk->bagian }}</td>
                            <td>{{ $sk->pelaksana }}</td>
                            <td>{{ $sk->perihal }}</td>
                            <td>
                                {{-- Tombol detail --}}
                                <a href="{{ route('surat-keluar.show', $sk->id_surat_keluar) }}" title="Detail Surat"
                                    data-bs-toggle="tooltip" data-bs-placement="right" class="btn btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Tombol cetak --}}
                                <a href="#" title="Cetak Surat" data-bs-toggle="tooltip" data-bs-placement="right"
                                    class="btn btn-sm">
                                    <i class="bi bi-printer"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="pt-3">
                                <h6 class="text-center">Data surat keluar tidak tersedia.</h6>
                            </td>
                        </tr>
                    @endforelse
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
