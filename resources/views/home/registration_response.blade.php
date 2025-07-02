<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Interaktif</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-8">
            <!-- Judul Survei -->
            @if ($survey->count() > 0)
                <h1 class="text-2xl font-bold mb-6 text-center">{{ $survey->first()->title }}</h1>
            @else
                <h1 class="text-2xl font-bold mb-6 text-center">Tidak ada survei aktif</h1>
            @endif

            <!-- Form Kuis -->
            <form id="quiz-form" action="{{ route('responses.store') }}" method="POST">
                @csrf
                <input type="hidden" name="participant_id" value="{{ $participant->id }}">
                <input type="hidden" name="survey_id" value="{{ $survey->id }}">

                <!-- Soal Kuis -->
                <div id="quiz-container">
                    @foreach ($questions as $index => $question)
                        <div id="question-{{ $index + 1 }}" class="question {{ $index === 0 ? '' : 'hidden' }}"
                            data-question-id="{{ $question->id }}">
                            <h2 class="text-xl font-bold mb-4">{{ $index + 1 }}. {{ $question->question_text }}</h2>
                            <div class="space-y-3">
                                @foreach ($question->options as $option)
                                    <label
                                        class="flex items-center p-4 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                        <input type="radio" name="responses[{{ $question->id }}]"
                                            value="{{ $option->id }}" class="form-radio h-5 w-5 text-indigo-600">
                                        <span class="ml-3">{{ $option->option_text }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pesan Error (Dihapus) -->
                <!-- <div id="error-message" class="text-red-500 mt-4 hidden">Silakan pilih jawaban terlebih dahulu!</div> -->

                <!-- Tombol Selanjutnya -->
                <div class="mt-8 flex justify-end">
                    <button type="button" id="next-button"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Selanjutnya
                    </button>
                    <button type="submit" id="submit-button" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 hidden">
                        Selesai
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript untuk Navigasi Soal dan Validasi -->
    <script>
        let currentQuestion = 1;
        const totalQuestions = {{ $questions->count() }};

        // Fungsi untuk mengecek apakah jawaban sudah dipilih
        function isAnswerSelected() {
            const questionId = document.querySelector(`#question-${currentQuestion}`).getAttribute('data-question-id');
            const selectedAnswer = document.querySelector(`input[name="responses[${questionId}]"]:checked`);
            return selectedAnswer !== null;
        }

        // Fungsi untuk menampilkan soal berikutnya
        function showNextQuestion(event) {
            // Cegah pengiriman formulir jika jawaban belum dipilih
            if (!isAnswerSelected()) {
                // Anda bisa menambahkan logika lain di sini jika perlu
                return;
            }

            if (currentQuestion < totalQuestions) {
                document.getElementById(`question-${currentQuestion}`).classList.add('hidden');
                currentQuestion++;
                document.getElementById(`question-${currentQuestion}`).classList.remove('hidden');
            }

            // Tampilkan tombol "Selesai" jika sudah di soal terakhir
            if (currentQuestion === totalQuestions) {
                document.getElementById('next-button').classList.add('hidden');
                document.getElementById('submit-button').classList.remove('hidden');
            }
        }

        // Event listener untuk tombol "Selanjutnya"
        document.getElementById('next-button').addEventListener('click', showNextQuestion);
    </script>
    @include('admin.layouts.partials.sweet-alert')
</body>

</html>