<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIGAP - Siaga Ambulans Gratis Pasaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom dominant green color */
        :root {
            --color-primary: #00764B;
        }

        body {
            background: linear-gradient(135deg, var(--color-primary) 0%, #004C31 100%);
            font-family: 'Inter', sans-serif;
        }

        .shadow-green {
            box-shadow: 0 4px 8px rgba(0, 118, 75, 0.4);
        }
    </style>
</head>

<body class="min-h-screen flex flex-col items-center px-4 py-12 text-white">
    <!-- Header + Icon + Description Section -->
    <header class="mb-10 text-center max-w-xl w-full">
        <h1 class="text-5xl font-extrabold mb-6">
            <span>HAL</span><span class="text-yellow-400">LO </span><span>SIG</span><span
                class="text-yellow-400">AP</span>
        </h1>

        <h1 class="text-5xl font-extrabold mb-6">
            <span>+62 822-99-6000-40</span>
        </h1>

        <h3 class="text-2xl font-semibold mb-1">SIAGA AMBULAN GRATIS PASAMAN</h3>
        {{-- <h3 class="font-bold text-lg mb-4">Layanan Ambulans Gratis Pasaman</h3> --}}

    </header>

    <!-- 16 Contact Cards Section -->
    {{-- <section class="mb-14 w-full max-w-7xl">
        <h3 class="text-2xl font-bold text-center mb-8 text-yellow-400">Nomor Kontak Darurat SIGAP</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

            <!-- Card 1 -->
            @forelse ($puskesmas as $item)
                <div
                    class="bg-white bg-opacity-10 backdrop-blur-md rounded-xl shadow-lg p-6 text-green-100 shadow-green hover:shadow-green/90 transition-all duration-300 hover:scale-105">
                    <div class="flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-semibold mb-2 text-center">{{ $item->nama }}</h4>
                    <p class="text-center text-yellow-300 font-bold text-xl mb-2">{{ $item->nomor_telepon }}</p>
                    <p class="text-xs text-center text-green-200">{{ $item->kecamatan }}</p>
                </div>
            @empty
                <p>No Data</p>
            @endforelse




        </div>
    </section> --}}

    <!-- Table Section -->
    @php
        $data = [
            ['NS. FRANDYKA HENDRY, S.Kep., MKM', 'Dinas Kesehatan', '0822-9960-0040', '-', '-'],
            ['Alfenda Nelfia, SKM', 'Puskesmas Ladang Panjang', '0821-7086-4175', 'Jendriadi', '0822-9877-7645'],
            ['dr. Yasmameri', 'Puskesmas Simpati', '0823-8497-2454', 'Nelfiandi', '0823-8640-5864'],
            ['Hj. Fitria, S, ST', 'Puskesmas Kumpulan', '0813-7452-9115', 'Yopi', '0823-9187-0100'],
            ['Ns. Rosenani,S.Kep', 'Puskesmas Bonjol', '0812-6781-5684', 'Eti Yendriani', '0822-8341-3674'],
            ['Desmariza, S.K.M, M.P.H', 'Puskesmas Lubuk Sikaping', '0812-2796-4977', 'Nanda', '0851-8436-3552'],
            ['drg.Edhi Suandi', 'Puskesmas Sundatar', '0813-7415-1677', 'Beni', '0821-7040-8424'],
            ['Isra Hasanah Harahap, SKM', 'Puskesmas Pegang Baru', '0822-5097-0328', 'Ari', '0813-7417-5357'],
            ['Arliati, S.SiT', 'Puskesmas Kuamang', '0813-8388-8673', 'Ucok', '0813-6312-6445'],
            ['Ns. Gusti Amrita, S.Kep', 'Puskesmas Cubadak', '0852-3092-8448', 'Igd', '0853-6541-8991'],
            ['Aisyah, S. ST', 'Puskesmas Simpang Tonang', '0822-8341-3532', 'Roni', '0812-6608-8000'],
            ['dr.Randi Maredo Amdani', 'Puskesmas Tapus', '0812-6750-3241', 'Uyung', '0821-7288-0415'],
            ['Meliningsih,S.Gz', 'Puskesmas Lansad Kadap', '0853-7513-3318', 'Ade', '0813-1515-4342'],
            ['dr. H. Tulus Pujiantoro', 'Puskesmas Rao', '0812-9513-9499', 'Dogun', '0812-7587-0202'],
            ['Elma, SKM', 'Puskesmas Koto Rajo', '0812-6620-5627', 'Dedi Febrina', '0821-7103-8203'],
            ['Tussilowati, S.St', 'Puskesmas Pintu Padang', '0821-7108-5363', 'Ebit G Ade', '0821-6752-9224'],
            ['Widiawati, Amd.Keb', 'Puskesmas Silayang', '0823-7119-3205', 'Febriansyah', '0821-7082-8309'],
        ];
    @endphp

    <section class="w-full overflow-x-auto max-w-7xl mb-8">
        <h3 class="text-2xl font-bold text-center mb-8 text-yellow-400">Call Center Hallo SIGAP</h3>
        <table
            class="min-w-full bg-white bg-opacity-10 backdrop-blur-sm rounded-lg shadow-green shadow-lg text-green-100 border border-green-700">
            <thead>
                <tr class="text-left text-green-300 uppercase text-sm">
                    <th class="py-3 px-4 border-b border-green-700">No</th>
                    <th class="py-3 px-4 border-b border-green-700">Nama Penanggung Jawab</th>
                    <th class="py-3 px-4 border-b border-green-700">Instansi</th>
                    <th class="py-3 px-4 border-b border-green-700">No. HP</th>
                    <th class="py-3 px-4 border-b border-green-700">Pelaksana</th>
                    <th class="py-3 px-4 border-b border-green-700">No. HP</th>
                </tr>
            </thead>
            <tbody class="text-green-100">
                @foreach ($data as $index => $row)
                    <tr class="hover:bg-green-800/30 transition-colors cursor-default">
                        <td class="py-3 px-4 border-b border-green-700">{{ $index + 1 }}</td>
                        <td class="py-3 px-4 border-b border-green-700">{{ $row[0] }}</td>
                        <td class="py-3 px-4 border-b border-green-700">{{ $row[1] }}</td>
                        <td class="py-3 px-4 border-b border-green-700">{{ $row[2] }}</td>
                        <td class="py-3 px-4 border-b border-green-700">{{ $row[3] }}</td>
                        <td class="py-3 px-4 border-b border-green-700">{{ $row[4] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <section class="w-full overflow-x-auto max-w-4xl">
        <h3 class="text-2xl font-bold text-center mb-8 text-yellow-400">Status Kendaraan</h3>
        <table
            class="min-w-full bg-white bg-opacity-10 backdrop-blur-sm rounded-lg shadow-green shadow-lg text-green-100 border border-green-700">
            <thead>
                <tr class="text-left text-green-300 uppercase text-sm">
                    <th class="py-3 px-4 border-b border-green-700">No</th>
                    <th class="py-3 px-4 border-b border-green-700">Nama Puskesmas</th>
                    <th class="py-3 px-4 border-b border-green-700">Nopol</th>
                    <th class="py-3 px-4 border-b border-green-700">Status</th>
                </tr>
            </thead>
            <tbody class="text-green-100">
                @forelse ($ambulans as $car)
                    <tr class="hover:bg-green-800/30 transition-colors cursor-default">
                        <td class="py-3 px-4 border-b border-green-700">{{ $loop->iteration }}</td>
                        <td class="py-3 px-4 border-b border-green-700">{{ $car->puskesmas->nama }}</td>
                        <td class="py-3 px-4 border-b border-green-700">{{ $car->nomor_polisi }}</td>
                        </td>
                        <td class="py-3 px-4 border-b border-green-700 font-semibold">
                            @if ($car->status == 'standby')
                                <span class="bg-green-600 text-white px-2 py-1 rounded-full text-sm">Standby</span>
                            @else
                                <span class="bg-yellow-400 text-black px-2 py-1 rounded-full text-sm">Dinas</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <p>No Data</p>
                @endforelse

            </tbody>
        </table>
    </section>
</body>

</html>
