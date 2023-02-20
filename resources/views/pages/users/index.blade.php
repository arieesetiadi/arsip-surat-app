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
        <a href="{{ route('users.create') }}" title="Tambah Pengguna" data-bs-toggle="tooltip" data-bs-placement="left"
            class="btn btn-primary">
            <i class="bi bi-plus-circle"></i>
            Tambah Pengguna
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
                    @foreach ($users as $i => $user)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                {{-- Tombol detail --}}
                                <a href="{{ route('users.show', $user->id) }}" title="Detail dari {{ $user->name }}"
                                    data-bs-toggle="tooltip" data-bs-placement="right" class="btn btn-sm">
                                    <i class="bi bi-eye"></i>
                                </a>

                                {{-- Tombol ubah --}}
                                <a href="{{ route('users.edit', $user->id) }}" title="Edit data {{ $user->name }}"
                                    data-bs-toggle="tooltip" data-bs-placement="right" class="btn btn-sm">
                                    <i class="bi bi-pen"></i>
                                </a>

                                {{-- Tombol hapus --}}
                                <div class="d-inline-block">
                                    <form id="formUserDelete{{ $user->id }}"
                                        action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <a class="btn btn-sm" title="Hapus data {{ $user->name }}"
                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                        onclick="swalConfirm('formUserDelete{{ $user->id }}', 'Data dari {{ $user->name }} akan dihapus.')">
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
