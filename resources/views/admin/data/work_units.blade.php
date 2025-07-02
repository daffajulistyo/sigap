@extends('admin.layouts.app')
@section('title', 'Unit Kerja')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Unit Kerja</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Unit Kerja</li>
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
                                <h3 class="card-title">Daftar Unit Kerja</h3>
                                <div class="float-end">
                                    <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#createHouseModal">
                                        <i class="bi bi-plus"></i> Tambah Unit Kerja
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($workUnits as $index => $unit_kerja)
                                            <tr>
                                                <td>{{ $workUnits->firstItem() + $index }}</td>
                                                <td>{{ $unit_kerja->name }}</td>
                                                <td>
                                                    <!-- Tombol Edit -->
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editTechnicianModal{{ $unit_kerja->id }}"
                                                        title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <!-- Tombol Delete -->
                                                    <form id="delete-form-{{ $unit_kerja->id }}"
                                                        action="{{ route('unit_kerja.destroy', $unit_kerja->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmDelete({{ $unit_kerja->id }})" title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            <!-- Modal Edit Admin -->
                                            <div class="modal fade" id="editTechnicianModal{{ $unit_kerja->id }}"
                                                tabindex="-1"
                                                aria-labelledby="editTechnicianModalLabel{{ $unit_kerja->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editTechnicianModalLabel{{ $unit_kerja->id }}">Edit
                                                                Unit Kerja {{ $unit_kerja->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST"
                                                            action="{{ route('unit_kerja.update', $unit_kerja->id) }}">
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
                                                                            value="{{ $unit_kerja->name }}" required>
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
                            <div class="card-footer clearfix">
                                {{ $workUnits->links() }}

                            </div>
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
    <div class="modal fade" id="createHouseModal" tabindex="-1" aria-labelledby="createHouseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createHouseModalLabel">Tambah Unit Kerja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addTicketForm" method="POST" action="{{ route('unit_kerja.store') }}">
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
