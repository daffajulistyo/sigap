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
                <!--begin::Row-->
                <div class="row">
                    <!-- Widget: Total Responses -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box text-bg-primary">
                            <div class="inner">
                                <h3>11</h3>
                                <p>Total Puskesmas</p>
                            </div>
                            <i class="small-box-icon fas fa-people-group fa-2x"></i>
                            <a href="#"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                Selengkapnya <i class="bi bi-link-45deg"></i> </a>
                        </div>
                    </div>
                    <!-- Widget: Total Participants -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box text-bg-success">
                            <div class="inner">
                                <h3>21</h3>
                                <p>Total Ambulance</p>
                            </div>
                            <i class="small-box-icon fas fa-users fa-2x"></i>
                            <a href="#"
                                class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                                Selengkapnya <i class="bi bi-link-45deg"></i> </a>
                        </div>
                    </div>
                    <!-- Widget: Total Active Surveys -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box text-bg-warning">
                            <div class="inner">
                                <h3>2</h3>
                                <p>Ambulancec Stanby</p>
                            </div>
                            <i class="small-box-icon fas fa-clipboard-list fa-2x"></i>
                            <a href="#"
                                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                Selengkapnya <i class="bi bi-link-45deg"></i> </a>
                        </div>
                    </div>
                </div>
                <!--end::Row-->


            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
   
@endsection
