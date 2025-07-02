<div class="modal fade" id="createPuskesmasModal" tabindex="-1" aria-labelledby="createPuskesmasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createPuskesmasModalLabel">Tambah Data Puskesmas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addPuskesmasForm" method="POST" action="{{ route('puskesmas.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Baris 1: Kode dan Nama Puskesmas -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kode_puskesmas" class="form-label">Kode Puskesmas</label>
                            <input type="text" class="form-control @error('kode_puskesmas') is-invalid @enderror"
                                   id="kode_puskesmas" name="kode_puskesmas"
                                   value="{{ old('kode_puskesmas') }}" required>
                            @error('kode_puskesmas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama Puskesmas</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                   id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Baris 2: Alamat -->
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror"
                                      id="alamat" name="alamat" rows="2" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Baris 3: Kecamatan dan Desa -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                   id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}" required>
                            @error('kecamatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="desa" class="form-label">Desa/Kelurahan</label>
                            <input type="text" class="form-control @error('desa') is-invalid @enderror"
                                   id="desa" name="desa" value="{{ old('desa') }}" required>
                            @error('desa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Baris 4: Nomor Telepon -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('nomor_telepon') is-invalid @enderror"
                                   id="nomor_telepon" name="nomor_telepon" value="{{ old('nomor_telepon') }}" required>
                            @error('nomor_telepon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Input Koordinat Tersembunyi -->
                    <input type="hidden" name="latitude" value="{{ old('latitude', -0.31628) }}">
                    <input type="hidden" name="longitude" value="{{ old('longitude', 100.3489) }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
