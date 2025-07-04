@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Dashboard</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                @if (auth()->user()->role === 'superadmin')
                    <!-- Tampilan untuk Super Admin -->
                    <div class="row">
                        <!-- Widget: Total Puskesmas -->
                        <div class="col-lg-4 col-6">
                            <div class="small-box text-bg-primary">
                                <div class="inner">
                                    <h3>{{ $totalPuskesmas }}</h3>
                                    <p>Total Puskesmas</p>
                                </div>
                                <i class="small-box-icon fas fa-people-group fa-2x"></i>
                                <a href="{{ route('puskesmas.index') }}"
                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Selengkapnya <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Widget: Total Ambulance -->
                        <div class="col-lg-4 col-6">
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                    <h3>{{ $totalAmbulans }}</h3>
                                    <p>Total Ambulance</p>
                                </div>
                                <i class="small-box-icon fas fa-ambulance fa-2x"></i>
                                <a href="{{ route('ambulans.index') }}"
                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Selengkapnya <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>
                        <!-- Widget: Ambulance Stanby -->
                        <div class="col-lg-4 col-6">
                            <div class="small-box text-bg-warning">
                                <div class="inner">
                                    <h3>{{ $ambulansStanby }}</h3>
                                    <p>Ambulance Stanby</p>
                                </div>
                                <i class="small-box-icon fas fa-clock fa-2x"></i>
                                <a href="#"
                                    class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Selengkapnya <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Tampilan untuk Admin Puskesmas -->
                    <div class="row">
                        <!-- Widget: Nama Puskesmas -->
                        <div class="col-lg-6 col-12">
                            <div class="small-box text-bg-warning">
                                <div class="inner">
                                    <h3>{{ auth()->user()->puskesmas->nama ?? 'Puskesmas' }}</h3>
                                    <p>Puskesmas Anda</p>
                                </div>
                                <i class="small-box-icon fas fa-hospital fa-2x"></i>
                                <a href="#"
                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Detail Puskesmas <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Widget: Total Ambulance Puskesmas -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-success">
                                <div class="inner">
                                    <h3>{{ $totalAmbulansPuskesmas }}</h3>
                                    <p>Ambulance Anda</p>
                                </div>
                                <i class="small-box-icon fas fa-ambulance fa-2x"></i>
                                <a href="{{ route('ambulans.index') }}"
                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Selengkapnya <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Widget: Status Ambulance -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box text-bg-{{ $ambulansStanbyPuskesmas > 0 ? 'success' : 'danger' }}">
                                <div class="inner">
                                    <h3>{{ $ambulansStanbyPuskesmas }}</h3>
                                    <p>Ambulance Stanby</p>
                                </div>
                                <i
                                    class="small-box-icon fas fa-{{ $ambulansStanbyPuskesmas > 0 ? 'check-circle' : 'exclamation-circle' }} fa-2x"></i>
                                <a href="{{ route('ambulans.index', ['status' => 'stanby']) }}"
                                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                    Lihat Status <i class="bi bi-link-45deg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Ambulance Puskesmas -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Daftar Ambulance Puskesmas Anda</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nomor Polisi</th>
                                                    <th>Status</th>
                                                    <th>Jenis</th>
                                                    <th>Terakhir Diperbarui</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($ambulansPuskesmas as $index => $ambulans)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $ambulans->nomor_polisi }}</td>
                                                        <td>
                                                            <span
                                                                class="badge bg-{{ $ambulans->status == 'standby' ? 'success' : 'danger' }}">
                                                                {{ ucfirst($ambulans->status) }}
                                                            </span>
                                                        </td>
                                                        <td>{{ $ambulans->merk ?? '-' }} ({{ $ambulans->tahun ?? '-' }})
                                                        </td>
                                                        <td>{{ $ambulans->updated_at->diffForHumans() }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">Tidak ada data ambulance</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->role === 'superadmin')
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">Tingkat Ketersediaan Ambulans</h5>
                                </div>
                                <div class="card-body">
                                    <div id="availabilityGauge" style="height: 300px;"></div>
                                    <div class="text-center mt-3">
                                        <span class="badge bg-success">Standby: {{ $chartData['standby'] }}</span>
                                        <span class="badge bg-warning text-dark mx-2">On Duty:
                                            {{ $chartData['on_duty'] }}</span>
                                        <span class="badge bg-secondary">Total: {{ $chartData['total'] }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

    @if (auth()->user()->role === 'superadmin')
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const availability = {{ $chartData['availability'] }};

                Highcharts.chart('availabilityGauge', {
                    chart: {
                        type: 'solidgauge',
                        backgroundColor: 'transparent'
                    },
                    title: null,
                    pane: {
                        center: ['50%', '85%'],
                        size: '140%',
                        startAngle: -90,
                        endAngle: 90,
                        background: {
                            backgroundColor: '#EEE',
                            innerRadius: '60%',
                            outerRadius: '100%',
                            shape: 'arc'
                        }
                    },
                    tooltip: {
                        enabled: false
                    },
                    yAxis: {
                        min: 0,
                        max: 100,
                        stops: [
                            [0.3, '#DF5353'], // Merah
                            [0.7, '#DDDF0D'], // Kuning
                            [0.9, '#55BF3B'] // Hijau
                        ],
                        lineWidth: 0,
                        tickWidth: 0,
                        minorTickInterval: null,
                        labels: {
                            y: 16
                        },
                        title: {
                            text: 'Ketersediaan<br>Ambulans',
                            y: -60
                        }
                    },
                    plotOptions: {
                        solidgauge: {
                            dataLabels: {
                                y: 5,
                                borderWidth: 0,
                                useHTML: true,
                                format: '<div style="text-align:center">' +
                                    '<span style="font-size:1.5rem">{y}%</span><br/>' +
                                    '<span style="font-size:0.8rem;color:silver">Standby</span>' +
                                    '</div>'
                            },
                            linecap: 'round',
                            stickyTracking: false,
                            rounded: true
                        }
                    },
                    series: [{
                        name: 'Ketersediaan',
                        data: [availability],
                        dataLabels: {
                            format: '<div style="text-align:center">' +
                                '<span style="font-size:1.5rem">{y}%</span><br/>' +
                                '<span style="font-size:0.8rem;color:silver">Standby</span>' +
                                '</div>'
                        }
                    }],
                    credits: {
                        enabled: false
                    }
                });
            });
        </script>
    @endif
@endsection
