@extends('admin.layouts.app')
@section('title', 'Master Akun')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Master Akun</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Master Akun</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Akun Admin</h3>
                                <div class="float-end">
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#createHouseModal">
                                        <i class="bi bi-plus"></i> Tambah Akun
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name }}</td>
                                                <td>{{ $admin->username }}</td>
                                                <td style="text-transform: capitalize;">{{ $admin->role }}</td>
                                                <td>
                                                    <!-- Tombol Edit -->
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editTechnicianModal{{ $admin->id }}"
                                                        title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <!-- Tombol Delete -->
                                                    <form id="delete-form-{{ $admin->id }}"
                                                        action="{{ route('users.destroy', $admin->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmDelete({{ $admin->id }})" title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#resetPasswordModal{{ $admin->id }}"
                                                        title="Reset Password">
                                                        <i class="bi bi-key"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Modal Edit Admin -->
                                            <div class="modal fade" id="editTechnicianModal{{ $admin->id }}"
                                                tabindex="-1"
                                                aria-labelledby="editTechnicianModalLabel{{ $admin->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editTechnicianModalLabel{{ $admin->id }}">Edit Admin
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('users.update', $admin->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <!-- Nama -->
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-md-3">
                                                                        <label for="name"
                                                                            class="form-label">Nama</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="{{ $admin->name }}" required>
                                                                    </div>
                                                                </div>
                                                                <!-- Username -->
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-md-3">
                                                                        <label for="username"
                                                                            class="form-label">Username</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="text" class="form-control"
                                                                            id="username" name="username"
                                                                            value="{{ $admin->username }}" required>
                                                                    </div>
                                                                </div>
                                                                <!-- Email -->
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-md-3">
                                                                        <label for="email"
                                                                            class="form-label">Email</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <input type="email" class="form-control"
                                                                            id="email" name="email"
                                                                            value="{{ $admin->email }}" required>
                                                                    </div>
                                                                </div>
                                                                <!-- Role -->
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-md-3">
                                                                        <label for="role"
                                                                            class="form-label">Role</label>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <select class="form-control" id="role"
                                                                            name="role" required>
                                                                            <option value="" disabled>Pilih...
                                                                            </option>
                                                                            <option value="superadmin"
                                                                                {{ $admin->role === 'superadmin' ? 'selected' : '' }}>
                                                                                Super Admin</option>
                                                                            <option value="admin"
                                                                                {{ $admin->role === 'admin' ? 'selected' : '' }}>
                                                                                Admin</option>
                                                                            <option value="user"
                                                                                {{ $admin->role === 'user' ? 'selected' : '' }}>
                                                                                User</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal Reset Password -->
                                            <div class="modal fade" id="resetPasswordModal{{ $admin->id }}"
                                                tabindex="-1"
                                                aria-labelledby="resetPasswordModalLabel{{ $admin->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="resetPasswordModalLabel{{ $admin->id }}">Reset
                                                                Password</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('users.reset_password', $admin->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <!-- Password Baru -->
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-md-4">
                                                                        <label for="password" class="form-label">Password
                                                                            Baru</label>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <input type="password" class="form-control"
                                                                            id="password" name="password" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-end">
                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                </ul>
                            </div> --}}
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

    <!-- Modal Create House -->
    <div class="modal fade" id="createHouseModal" tabindex="-1" aria-labelledby="createHouseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createHouseModalLabel">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addTicketForm" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="modal-body">
                        <!-- Nama -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="name" class="form-label">Nama</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <!-- Username -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="username" class="form-label">Username</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="password" class="form-label">Password</label>
                            </div>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                        <!-- Role -->
                        <div class="row mb-3 align-items-center">
                            <div class="col-md-3">
                                <label for="role" class="form-label">Role</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" id="role" name="role" required>
                                    <option value="">Pilih...</option>
                                    <option value="superadmin">Super Admin</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
