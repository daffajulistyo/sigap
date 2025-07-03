@extends('admin.layouts.app')
@section('title', 'Ambulans')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Ambulans</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ambulans</li>
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
                                <h3 class="card-title">Daftar Ambulans</h3>
                                <div class="float-end">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#createAmbulansModal">
                                        <i class="bi bi-plus"></i> Tambah Ambulans
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Puskesmas</th>
                                            <th>Detail Ambulance</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $currentPuskesmas = null;
                                            $rowspanCount = 0;
                                        @endphp

                                        @foreach ($ambulans as $key => $ambulan)
                                            @if ($ambulan->puskesmas_id != $currentPuskesmas)
                                                @php
                                                    $currentPuskesmas = $ambulan->puskesmas_id;
                                                    $rowspanCount = $ambulans->where('puskesmas_id', $currentPuskesmas)->count();
                                                @endphp
                                                <tr>
                                                    <td rowspan="{{ $rowspanCount }}">{{ $loop->iteration }}</td>
                                                    <td rowspan="{{ $rowspanCount }}">
                                                        <strong>{{ $ambulan->puskesmas->nama ?? '-' }}</strong><br>
                                                        <small class="text-muted">{{ $ambulan->puskesmas->kecamatan ?? '' }}</small>
                                                    </td>
                                                    <td>
                                                        <strong>{{ $ambulan->nomor_polisi }}</strong><br>
                                                        {{ $ambulan->merk }} ({{ $ambulan->tahun }})
                                                    </td>
                                                    <td>
                                                        <span class="badge
                                                            @if($ambulan->status == 'standby') bg-success
                                                            @elseif($ambulan->status == 'dinas') bg-warning text-dark
                                                            @else bg-danger @endif">
                                                            {{ ucfirst($ambulan->status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#showAmbulansModal"
                                                            data-ambulan="{{ json_encode($ambulan) }}">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-sm edit-ambulans"
                                                            data-id="{{ $ambulan->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#editAmbulansModal{{ $ambulan->id }}"
                                                            title="Edit">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $ambulan->id }}"
                                                            action="{{ route('ambulans.destroy', $ambulan->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete({{ $ambulan->id }})" title="Hapus">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>
                                                        <strong>{{ $ambulan->nomor_polisi }}</strong><br>
                                                        {{ $ambulan->merk }} ({{ $ambulan->tahun }})
                                                    </td>
                                                    <td>
                                                        <span class="badge
                                                            @if($ambulan->status == 'standby') bg-success
                                                            @elseif($ambulan->status == 'dinas') bg-warning text-dark
                                                            @else bg-danger @endif">
                                                            {{ ucfirst($ambulan->status) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#showAmbulansModal"
                                                            data-ambulan="{{ json_encode($ambulan) }}">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-primary btn-sm edit-ambulans"
                                                            data-id="{{ $ambulan->id }}" data-bs-toggle="modal"
                                                            data-bs-target="#editAmbulansModal{{ $ambulan->id }}"
                                                            title="Edit">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>
                                                        <form id="delete-form-{{ $ambulan->id }}"
                                                            action="{{ route('ambulans.destroy', $ambulan->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="confirmDelete({{ $ambulan->id }})" title="Hapus">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $ambulans->links() }}
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
    @include('admin.ambulans.create')
    @include('admin.ambulans.show')
@endsection
