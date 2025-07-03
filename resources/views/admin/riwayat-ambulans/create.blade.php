<!-- Modal Tambah Ambulans -->
<div class="modal fade" id="createAmbulansModal" tabindex="-1" aria-labelledby="createAmbulansModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createAmbulansModalLabel">Tambah Data Ambulans</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form id="addAmbulansForm" method="POST" action="{{ route('ambulans.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Baris 1: Puskesmas dan Nomor Polisi -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="puskesmas_id" class="form-label">Puskesmas</label>
                            <select class="form-select @error('puskesmas_id') is-invalid @enderror" id="puskesmas_id"
                                name="puskesmas_id" required>
                                <option value="">Pilih Puskesmas</option>
                                @php
                                    $puskesmas = \App\Models\Puskesmas::all();
                                @endphp
                                @foreach ($puskesmas as $puskesma)
                                    <option value="{{ $puskesma->id }}"
                                        {{ old('puskesmas_id') == $puskesma->id ? 'selected' : '' }}>
                                        {{ $puskesma->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('puskesmas_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                            <input type="text" class="form-control @error('nomor_polisi') is-invalid @enderror"
                                id="nomor_polisi" name="nomor_polisi" value="{{ old('nomor_polisi') }}" required>
                            @error('nomor_polisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Baris 2: Merk dan Tahun -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="merk" class="form-label">Merk</label>
                            <input type="text" class="form-control @error('merk') is-invalid @enderror"
                                id="merk" name="merk" value="{{ old('merk') }}" required>
                            @error('merk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="tahun" class="form-label">Tahun</label>
                            <input type="number" class="form-control @error('tahun') is-invalid @enderror"
                                id="tahun" name="tahun" value="{{ old('tahun') }}" min="2000"
                                max="{{ date('Y') + 1 }}" required>
                            @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Baris 3: Nomor Mesin dan Rangka -->
                    <div class="row mb-3" >
                        <div class="col-md-6">
                            <label for="nomor_mesin" class="form-label">Nomor Mesin</label>
                            <input type="text" class="form-control @error('nomor_mesin') is-invalid @enderror"
                                id="nomor_mesin" name="nomor_mesin" value="{{ old('nomor_mesin') }}" required>
                            @error('nomor_mesin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nomor_rangka" class="form-label">Nomor Rangka</label>
                            <input type="text" class="form-control @error('nomor_rangka') is-invalid @enderror"
                                id="nomor_rangka" name="nomor_rangka" value="{{ old('nomor_rangka') }}" required>
                            @error('nomor_rangka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Baris 4: Status dan KM Terakhir -->
                    <!-- Ganti bagian select status dengan input hidden dan display saja -->
                    <!-- Baris Status (dimodifikasi) -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" value="standby"
                                readonly>
                            <small class="text-muted">Status otomatis standby saat pertama ditambahkan</small>
                        </div>
                        <div class="col-md-6">
                            <label for="km_terakhir" class="form-label">KM Terakhir</label>
                            <input type="number" class="form-control @error('km_terakhir') is-invalid @enderror"
                                id="km_terakhir" name="km_terakhir" value="{{ old('km_terakhir', 0) }}" min="0"
                                required>
                            @error('km_terakhir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan"
                            rows="3">{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
