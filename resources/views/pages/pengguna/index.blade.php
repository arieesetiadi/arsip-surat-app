@extends('layouts.main')

@section('content')
    {{-- Tampilkan alert jika ada --}}
    @include('components.alert')

    <h2 class="mb-4 d-flex justify-content-between">
        <div>
            <i class="bi bi-person"></i>
            PENGGUNA
        </div>

        {{-- Tombol tambah pengguna --}}
        <a href="{{ route('pengguna.create') }}" title="Tambah Pengguna" data-bs-toggle="tooltip" data-bs-placement="left"
            class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Pengguna
        </a>
    </h2>

    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-lg table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Jenis Pengguna</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengguna as $i => $p)
                        <tr class="{{ $p->id_pengguna == pengguna()->id_pengguna ? 'fw-bold' : '' }}">
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->jenisPengguna->nama }}</td>
                            <td>{{ $p->username }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->telepon }}</td>
                            <td>
                                {{-- Tombol detail --}}
                                <a href="{{ route('pengguna.show', $p->id_pengguna) }}" title="Detail dari {{ $p->nama }}"
                                    data-bs-toggle="tooltip" data-bs-placement="right" class="btn btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Tombol ubah --}}
                                <a href="{{ route('pengguna.edit', $p->id_pengguna) }}" title="Edit data {{ $p->nama }}"
                                    data-bs-toggle="tooltip" data-bs-placement="right" class="btn btn-sm">
                                    <i class="bi bi-pen"></i>
                                </a>

                                {{-- Tombol hapus --}}
                                <div class="d-inline-block">
                                    <form id="formUserDelete{{ $p->id_pengguna }}"
                                        action="{{ route('pengguna.destroy', $p->id_pengguna) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-sm" title="Hapus data {{ $p->nama }}"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        onclick="swalConfirm('formUserDelete{{ $p->id_pengguna }}', 'Data dari {{ $p->nama }} akan dihapus.')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
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
