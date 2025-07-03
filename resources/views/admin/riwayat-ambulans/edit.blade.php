<!-- Modal Edit Riwayat -->
<div class="modal fade" id="editRiwayatModal{{ $item->id }}" tabindex="-1"
    aria-labelledby="editRiwayatModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRiwayatModalLabel{{ $item->id }}">Edit Riwayat Ambulans</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('riwayat-ambulans.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="ambulans_id" class="form-label">Ambulans</label>
                            <select class="form-control @error('ambulans_id') is-invalid @enderror" id="ambulans_id"
                                name="ambulans_id" required>
                                @php
                                    $user = auth()->user();
                                    $ambulans = \App\Models\Ambulans::where('puskesmas_id', $user->puskesmas_id)
                                        ->with('puskesmas')
                                        ->get();
                                @endphp
                                @foreach ($ambulans as $a)
                                    <option value="{{ $a->id }}"
                                        {{ $item->ambulans_id == $a->id ? 'selected' : '' }}>
                                        {{ $a->nomor_polisi }} - {{ $a->merk }} ({{ $a->tahun }})
                                    </option>
                                @endforeach
                            </select>
                            @error('ambulans_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="status_perjalanan" class="form-label">Status Perjalanan</label>
                            <select class="form-control @error('status_perjalanan') is-invalid @enderror"
                                id="status_perjalanan" name="status_perjalanan" required>
                                <option value="berjalan"
                                    {{ $item->status_perjalanan == 'berjalan' ? 'selected' : '' }}>Berjalan</option>
                                <option value="selesai" {{ $item->status_perjalanan == 'selesai' ? 'selected' : '' }}>
                                    Selesai</option>
                            </select>
                            @error('status_perjalanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <input type="text" class="form-control @error('tujuan') is-invalid @enderror"
                                id="tujuan" name="tujuan" value="{{ old('tujuan', $item->tujuan) }}" required>
                            @error('tujuan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="waktu_berangkat" class="form-label">Waktu Berangkat</label>
                            <input type="datetime-local"
                                class="form-control @error('waktu_berangkat') is-invalid @enderror" id="waktu_berangkat"
                                name="waktu_berangkat"
                                value="{{ old('waktu_berangkat', \Carbon\Carbon::parse($item->waktu_berangkat)->format('Y-m-d\TH:i')) }}"
                                required>
                            @error('waktu_berangkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="keperluan" class="form-label">Keperluan</label>
                            <textarea class="form-control @error('keperluan') is-invalid @enderror" id="keperluan" name="keperluan" rows="2"
                                required>{{ old('keperluan', $item->keperluan) }}</textarea>
                            @error('keperluan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="km_berangkat" class="form-label">KM Berangkat</label>
                            <input type="number" class="form-control @error('km_berangkat') is-invalid @enderror"
                                id="km_berangkat" name="km_berangkat"
                                value="{{ old('km_berangkat', $item->km_berangkat) }}" required>
                            @error('km_berangkat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="waktu_kembali" class="form-label">Waktu Kembali</label>
                            <input type="datetime-local"
                                class="form-control @error('waktu_kembali') is-invalid @enderror" id="waktu_kembali"
                                name="waktu_kembali"
                                value="{{ old('waktu_kembali', $item->waktu_kembali ? \Carbon\Carbon::parse($item->waktu_kembali)->format('Y-m-d\TH:i') : '') }}">
                            @error('waktu_kembali')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="km_kembali" class="form-label">KM Kembali</label>
                            <input type="number" class="form-control @error('km_kembali') is-invalid @enderror"
                                id="km_kembali" name="km_kembali" value="{{ old('km_kembali', $item->km_kembali) }}">
                            @error('km_kembali')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="2">{{ old('catatan', $item->catatan) }}</textarea>
                            @error('catatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
