<div class="modal fade" id="createRiwayatModal" tabindex="-1" aria-labelledby="createRiwayatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRiwayatModalLabel">Tambah Riwayat Perjalanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('riwayat-ambulans.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Ambulans -->
                    <div class="row mb-3">
                        <label for="ambulans_id" class="col-md-3 col-form-label">Ambulans</label>
                        <div class="col-md-9">
                            <select class="form-control" id="ambulans_id" name="ambulans_id" required>
                                <option value="">Pilih Ambulans</option>
                                @php
                                    $user = auth()->user();
                                    $ambulans = \App\Models\Ambulans::where('puskesmas_id', $user->puskesmas_id)
                                        ->with('puskesmas')
                                        ->get();
                                @endphp
                                @foreach ($ambulans as $a)
                                    <option value="{{ $a->id }}">{{ $a->nomor_polisi }} - {{ $a->merk }}
                                        ({{ $a->tahun }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Tujuan -->
                    <div class="row mb-3">
                        <label for="tujuan" class="col-md-3 col-form-label">Tujuan</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="tujuan" name="tujuan" required>
                        </div>
                    </div>

                    <!-- Keperluan -->
                    <div class="row mb-3">
                        <label for="keperluan" class="col-md-3 col-form-label">Keperluan</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="keperluan" name="keperluan" rows="2" required></textarea>
                        </div>
                    </div>

                    <!-- Waktu Berangkat -->
                    <div class="row mb-3">
                        <label for="waktu_berangkat" class="col-md-3 col-form-label">Waktu Berangkat</label>
                        <div class="col-md-9">
                            <input type="datetime-local" class="form-control" id="waktu_berangkat"
                                name="waktu_berangkat" required>
                        </div>
                    </div>

                    <!-- KM Berangkat -->
                    <div class="row mb-3">
                        <label for="km_berangkat" class="col-md-3 col-form-label">KM Berangkat</label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" id="km_berangkat" name="km_berangkat" required>
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="row mb-3">
                        <label for="status_perjalanan" class="col-md-3 col-form-label">Status Perjalanan</label>
                        <div class="col-md-9">
                            <select class="form-control" id="status_perjalanan" name="status_perjalanan" required>
                                <option value="berjalan">Berjalan</option>
                                <option value="selesai">Selesai</option>
                            </select>
                        </div>
                    </div>

                    <!-- Section untuk data kembali -->
                    <div id="sectionKembali" style="display: none;">
                        <!-- Waktu Kembali -->
                        <div class="row mb-3">
                            <label for="waktu_kembali" class="col-md-3 col-form-label">Waktu Kembali</label>
                            <div class="col-md-9">
                                <input type="datetime-local" class="form-control" id="waktu_kembali"
                                    name="waktu_kembali">
                            </div>
                        </div>

                        <!-- KM Kembali -->
                        <div class="row mb-3">
                            <label for="km_kembali" class="col-md-3 col-form-label">KM Kembali</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" id="km_kembali" name="km_kembali">
                            </div>
                        </div>

                        <!-- Catatan -->
                        <div class="row mb-3">
                            <label for="catatan" class="col-md-3 col-form-label">Catatan</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="catatan" name="catatan" rows="2"></textarea>
                            </div>
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

<script>
    // Tampilkan/sembunyikan section kembali berdasarkan status
    document.getElementById('status_perjalanan').addEventListener('change', function() {
        const sectionKembali = document.getElementById('sectionKembali');
        if (this.value === 'selesai') {
            sectionKembali.style.display = 'block';
            // Set required fields
            document.getElementById('waktu_kembali').setAttribute('required', 'required');
            document.getElementById('km_kembali').setAttribute('required', 'required');
        } else {
            sectionKembali.style.display = 'none';
            // Remove required fields
            document.getElementById('waktu_kembali').removeAttribute('required');
            document.getElementById('km_kembali').removeAttribute('required');
        }
    });
</script>
