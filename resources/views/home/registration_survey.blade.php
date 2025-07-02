@php
    $activeSurveys = \App\Models\Survey::where('is_active', true)->get(); // Change to true to get active surveys
@endphp

@if ($activeSurveys->isEmpty())
    @include('survey_empty')
@else
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register Responden</title>
        <link rel="icon" href="{{ asset('assets/dist/assets/img/logo.png') }}" type="image/x-icon">

        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            /* Custom CSS untuk Select2 */
            .select2-container .select2-selection--single {
                height: 48px;
                border-radius: 0.375rem;
                border: 1px solid #d1d5db;
                background-color: #f3f4f6;
                padding: 0.5rem 0.75rem;
            }

            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 46px;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 32px;
                color: #374151;
            }

            .select2-dropdown {
                border-radius: 0.375rem;
                border: 1px solid #d1d5db;
                background-color: #ffffff;
            }

            .select2-results__option {
                padding: 0.5rem 0.75rem;
            }

            .select2-container--default .select2-results__option--highlighted[aria-selected] {
                background-color: #111827;
                color: white;
            }

            /* Custom Wave Background */
            .wave-background {
                position: relative;
                background: linear-gradient(135deg, #1d8a3d, #4caf50);
                overflow: hidden;
            }

            .wave-background::before,
            .wave-background::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                height: 80%;
                background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%23ffffff' fill-opacity='0.2' d='M0,192L48,181.3C96,171,192,149,288,154.7C384,160,480,192,576,192C672,192,768,160,864,138.7C960,117,1056,107,1152,117.3C1248,128,1344,160,1392,176L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
                background-size: cover;
                background-repeat: no-repeat;
                z-index: 1;
            }

            .wave-background::after {
                bottom: -10px;
                opacity: 0.5;
                background-position-y: 20px;
            }
        </style>
    </head>

    <body class="bg-gray-900">
        <!-- Wave Background Section -->
        <div class="wave-background min-h-screen flex items-center justify-center">
            <section class="py-10 w-full">
                <div class="container mx-auto px-4">
                    <div class="flex justify-center">
                        <!-- Form Container -->
                        <div class="bg-white rounded-lg shadow-2xl w-full max-w-3xl overflow-hidden z-10">
                            <div class="p-8">
                                <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">Silahkan Isi Data Diri
                                    Anda</h2>
                                <p class="text-center mb-8 text-gray-600">Sistem <strong>Sikamek</strong> hanya memakai
                                    data anda sebagai bahan referensi survei</p>
                                <form action="{{ route('participants.store') }}" method="POST" class="space-y-6">
                                    @csrf
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <!-- Input NIK -->
                                        <div>
                                            <label for="nik"
                                                class="block text-sm font-medium text-gray-700 mb-2">NIK</label>
                                            <input type="number"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"
                                                name="nik" id="nik" placeholder="Input NIK">
                                        </div>

                                        <!-- Input Nama Lengkap -->
                                        <div>
                                            <label for="nama"
                                                class="block text-sm font-medium text-gray-700 mb-2">Nama
                                                Lengkap</label>
                                            <input type="text"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"
                                                name="nama" id="nama" placeholder="Input Nama Lengkap" required>
                                        </div>

                                        <!-- Dropdown Usia -->
                                        <div>
                                            <label for="usia"
                                                class="block text-sm font-medium text-gray-700 mb-2">Usia</label>
                                            <select
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"
                                                id="usia" name="usia" required>
                                                <option selected disabled value="">Pilih Usia</option>
                                                @foreach ($ageGroups as $age)
                                                    <option value="{{ $age->id }}">{{ $age->range }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Input Email -->
                                        <div>
                                            <label for="email"
                                                class="block text-sm font-medium text-gray-700 mb-2">Email
                                                (Optional)</label>
                                            <input type="email"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"
                                                name="email" id="email" placeholder="Input Alamat Email">
                                        </div>

                                        <!-- Dropdown Jenis Kelamin -->
                                        <div>
                                            <label for="jenis-kelamin"
                                                class="block text-sm font-medium text-gray-700 mb-2">Jenis
                                                Kelamin</label>
                                            <select
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"
                                                id="jenis-kelamin" name="jenis-kelamin" required>
                                                <option selected disabled value="">Pilih Jenis Kelamin</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                        <!-- Dropdown Pendidikan -->
                                        <div>
                                            <label for="pendidikan"
                                                class="block text-sm font-medium text-gray-700 mb-2">Pendidikan</label>
                                            <select
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"
                                                id="pendidikan" name="pendidikan" required>
                                                <option selected disabled value="">Pilih Pendidikan</option>
                                                @foreach ($educationLevels as $pendidikan)
                                                    <option value="{{ $pendidikan->id }}">{{ $pendidikan->level }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Dropdown Pekerjaan -->
                                        <div class="col-span-full">
                                            <label for="pekerjaan"
                                                class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan</label>
                                            <select
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"
                                                id="pekerjaan" name="pekerjaan" required>
                                                <option selected disabled value="">Pilih Pekerjaan</option>
                                                @foreach ($occupations as $pekerjaan)
                                                    <option value="{{ $pekerjaan->id }}">{{ $pekerjaan->occupation }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Dropdown Unit Kerja -->
                                        <div class="col-span-full">
                                            <label for="unit-kerja"
                                                class="block text-sm font-medium text-gray-700 mb-2">Unit Kerja Yang
                                                Dinilai</label>
                                            <select
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 select2"
                                                id="unit-kerja" name="unit-kerja" required>
                                                <option selected disabled value="">Pilih Unit Kerja</option>
                                                @foreach ($workUnits as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Tombol Simpan -->
                                    <div class="flex justify-center mt-8">
                                        <button type="submit"
                                            class="inline-flex justify-center py-3 px-8 border border-transparent shadow-sm text-lg font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- jQuery (diperlukan oleh Select2) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                // Inisialisasi Select2 untuk dropdown dengan pencarian
                $('.select2').select2({
                    placeholder: 'Pilih Unit Kerja Yang Dinilai', // Placeholder untuk Select2
                    allowClear: true,
                });
            });
        </script>
        @include('admin.layouts.partials.sweet-alert')
    </body>

    </html>
@endif
