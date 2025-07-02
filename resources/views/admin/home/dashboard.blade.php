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
                                <h3>{{ $totalParticipants }}</h3>
                                <p>Total Responden</p>
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
                                <h3>{{ $totalParticipants }}</h3>
                                <p>Total Peserta</p>
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
                                <h3>{{ $totalActiveSurveys }}</h3>
                                <p>Total Survey</p>
                            </div>
                            <i class="small-box-icon fas fa-clipboard-list fa-2x"></i>
                            <a href="#"
                                class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                                Selengkapnya <i class="bi bi-link-45deg"></i> </a>
                        </div>
                    </div>
                </div>
                <!--end::Row-->

                <!-- Grafik Pie: Participant Berdasarkan Umur dan Gender -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header text-center">
                                <h5 class="card-title">{{ $surveyTitle }}</h5>
                            </div>
                            <div class="card-body">
                                <form method="GET" action="{{ route('dashboard') }}"
                                    class="row g-3 justify-content-center">
                                    <div class="col-md-6">
                                        <strong>Cari Survey:</strong>
                                        <select name="survey_id" class="form-select" onchange="this.form.submit()">
                                            @foreach ($surveys as $survey)
                                                <option value="{{ $survey->id }}"
                                                    {{ $selectedSurveyId == $survey->id ? 'selected' : '' }}>
                                                    {{ $survey->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Cari Unit Kerja:</strong>
                                        <select name="work_unit_id" class="form-select" onchange="this.form.submit()">
                                            <option value="">Semua Unit Kerja</option>
                                            @php
                                                $workUnits = \App\Models\WorkUnit::all();
                                            @endphp
                                            @foreach ($workUnits as $workUnit)
                                                <option value="{{ $workUnit->id }}"
                                                    {{ $selectedWorkUnitId == $workUnit->id ? 'selected' : '' }}>
                                                    {{ $workUnit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div id="ageGroupChart" style="width:100%; height:400px;"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="genderChart" style="width:100%; height:400px;"></div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <div id="occupationChart" style="width:100%; height:400px;"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div id="educationChart" style="width:100%; height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grafik Batang: Jawaban per Pertanyaan -->
                <div class="row mt-4">
                    @if ($questions->isNotEmpty())
                        @foreach ($questions as $question)
                            <div class="col-lg-6 mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Pertanyaan {{ $loop->index + 1 }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="questionChart{{ $question->id }}" style="width:100%; height:400px;"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            <div class="alert alert-danger text-center" role="alert">
                                Tidak ada pertanyaan dari survei aktif untuk ditampilkan.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>

    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        // Grafik Pie: Participant Berdasarkan Umur
        const ageGroupData = {
            labels: @json($ageGroups->pluck('range')),
            data: @json($ageGroups->pluck('participants_count')),
        };

        Highcharts.chart('ageGroupChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Participant Berdasarkan Umur'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah Participant',
                colorByPoint: true,
                data: ageGroupData.labels.map((label, index) => ({
                    name: label,
                    y: ageGroupData.data[index],
                    sliced: index === 0, // Sliced the first item for emphasis
                    selected: index === 0 // Select the first item by default
                }))
            }]
        });

        // Grafik Pie: Participant Berdasarkan Gender
        const genderData = {
            labels: @json($genderCounts->pluck('gender')),
            data: @json($genderCounts->pluck('count')),
        };

        Highcharts.chart('genderChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Participant Berdasarkan Gender'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah Participant',
                colorByPoint: true,
                data: genderData.labels.map((label, index) => ({
                    name: label,
                    y: genderData.data[index],
                    sliced: index === 0, // Sliced the first item for emphasis
                    selected: index === 0 // Select the first item by default
                }))
            }]
        });

        const occupationData = {
            labels: @json($occupationCounts->pluck('occupation')),
            data: @json($occupationCounts->pluck('participants_count')),
        };

        // Filter data untuk hanya menyertakan yang memiliki jumlah peserta lebih dari 0
        const filteredData = occupationData.labels
            .map((label, index) => ({
                name: label,
                y: occupationData.data[index]
            }))
            .filter(item => item.y > 0); // Hanya ambil item dengan y > 0

        Highcharts.chart('occupationChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Participant Berdasarkan Pekerjaan'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah Participant',
                colorByPoint: true,
                data: filteredData.map((item, index) => ({
                    name: item.name,
                    y: item.y,
                    sliced: index === 0, // Sliced the first item for emphasis
                    selected: index === 0 // Select the first item by default
                }))
            }]
        });

        // Grafik Pie: Participant Berdasarkan Umur
        const educationLevelData = {
            labels: @json($educationLevelCounts->pluck('level')),
            data: @json($educationLevelCounts->pluck('participants_count')),
        };

        Highcharts.chart('educationChart', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Participant Berdasarkan Pendidikan'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: ''
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}: <b>{point.y}</b>'
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah Participant',
                colorByPoint: true,
                data: educationLevelData.labels.map((label, index) => ({
                    name: label,
                    y: educationLevelData.data[index],
                    sliced: index === 0, // Sliced the first item for emphasis
                    selected: index === 0 // Select the first item by default
                }))
            }]
        });

        // Grafik Batang: Jawaban per Pertanyaan
        @foreach ($questions as $question)
            const questionData{{ $question->id }} = {
                labels: @json($question->options->pluck('option_text')),
                data: @json(
                    $question->options->map(function ($option) {
                        return $option->responses->count();
                    })),
            };
            Highcharts.chart('questionChart{{ $question->id }}', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: '{{ $question->question_text }}'
                },
                xAxis: {
                    categories: questionData{{ $question->id }}.labels
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Peserta'
                    }
                },
                series: [{
                    name: 'Jumlah Peserta',
                    data: questionData{{ $question->id }}.data
                }]
            });
        @endforeach
    </script>
@endsection
