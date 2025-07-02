@extends('admin.layouts.app')
@section('title', 'Puskesmas')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Puskesmas</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Puskesmas</li>
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
                                <h3 class="card-title">Daftar Puskesmas</h3>
                                <div class="float-end">

                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#createPuskesmasModal">
                                        <i class="bi bi-plus"></i> Tambah Puskesmas
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Kecamatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($puskesmas as $index => $puskesma)
                                            <tr>
                                                <td>{{ $puskesmas->firstItem() + $index }}</td>
                                                <td>{{ $puskesma->kode_puskesmas }}</td>
                                                <td>{{ $puskesma->nama }}</td>
                                                <td>{{ $puskesma->kecamatan }}</td>
                                                <td>
                                                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#showPuskesmasModal"
                                                        data-puskesmas="{{ json_encode($puskesma) }}">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <!-- Pastikan data-id sesuai dengan ID puskesmas -->
                                                    <button type="button" class="btn btn-primary btn-sm edit-puskesmas"
                                                        data-id="{{ $puskesma->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#editPuskesmasModal{{ $puskesma->id }}"
                                                        title="Edit">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <!-- ... -->
                                                    <!-- Tombol Delete -->
                                                    <form id="delete-form-{{ $puskesma->id }}"
                                                        action="{{ route('puskesmas.destroy', $puskesma->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="confirmDelete({{ $puskesma->id }})" title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                            <!-- Modal Edit Admin -->
                                            @include('admin.puskesmas.edit')
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $puskesmas->links() }}

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
    @include('admin.puskesmas.create')
    @include('admin.puskesmas.show')


@endsection
