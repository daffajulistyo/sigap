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
                        <h3 class="mb-0">Riwayat Ambulance</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Ambulance</li>
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
                                <h3 class="card-title">Daftar Riwayat Ambulance</h3>
                                {{-- <div class="float-end">
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#createAmbulansModal">
                                        <i class="bi bi-plus"></i> Tambah Ambulans
                                    </button>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Ambulance</th>
                                            <th>Tujuan</th>
                                            <th>Waktu</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayat as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <strong>{{ $item->ambulans->nomor_polisi }} -
                                                        {{ $item->ambulans->merk }}
                                                        ({{ $item->ambulans->tahun }})</strong><br>
                                                    <small>{{ $item->ambulans->puskesmas->nama }}</small>
                                                </td>
                                                <td>{{ $item->tujuan }}</td>
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <div class="mb-1 d-flex align-items-center">
                                                            <i class="bi bi-arrow-right-circle-fill text-primary me-2"></i>
                                                            <div>
                                                                <strong>
                                                                    {{ \Carbon\Carbon::parse($item->waktu_berangkat)->locale('id')->isoFormat('ddd, D MMM YYYY') }}
                                                                    •
                                                                    {{ \Carbon\Carbon::parse($item->waktu_berangkat)->format('H.i') }}
                                                                </strong>
                                                            </div>
                                                        </div>

                                                        @if ($item->waktu_kembali)
                                                            <div class="d-flex align-items-center">
                                                                <i
                                                                    class="bi bi-arrow-left-circle-fill text-success me-2"></i>
                                                                <div>
                                                                    <strong>
                                                                        {{ \Carbon\Carbon::parse($item->waktu_kembali)->locale('id')->isoFormat('ddd, D MMM YYYY') }}
                                                                        •
                                                                        {{ \Carbon\Carbon::parse($item->waktu_kembali)->format('H.i') }}
                                                                    </strong>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($item->status_perjalanan == 'berjalan')
                                                        <span class="badge bg-warning text-dark">Berjalan</span>
                                                    @else
                                                        <span class="badge bg-success">Selesai</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('riwayat-ambulans.show', $item->id) }}"
                                                        class="btn btn-sm btn-info" title="Detail">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                {{ $riwayat->links() }}
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

    @include('admin.ambulans.show')
@endsection
