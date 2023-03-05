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
        <a href="{{ route('pengguna.create') }}" title="Tambah Surat Keluar" data-bs-toggle="tooltip" data-bs-placement="left"
            class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Surat Keluar
        </a>
    </h2>

    <div class="container-fluid">
        <div class="table-responsive">
            <table id="example" class="table table-lg table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    {{--  --}}
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
