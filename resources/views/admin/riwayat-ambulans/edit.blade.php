<!-- Modal Edit Riwayat -->
<div class="modal fade" id="editRiwayatModal" tabindex="-1" aria-labelledby="editRiwayatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRiwayatModalLabel">Edit Riwayat Perjalanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editRiwayatForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th width="30%" class="text-end pe-3">Ambulans:</th>
                                    <td class="border-start">
                                        <select class="form-control form-control-sm" id="edit-ambulans_id" name="ambulans_id" required>
                                            @php
                                    $user = auth()->user();
                                    $ambulans = \App\Models\Ambulans::where('puskesmas_id', $user->puskesmas_id)
                                        ->with('puskesmas')
                                        ->get();
                                @endphp
                                            @foreach($ambulans as $a)
                                                <option value="{{ $a->id }}">{{ $a->nopol }} - {{ $a->merk }} ({{ $a->tahun }})</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-end pe-3">Tujuan:</th>
                                    <td class="border-start">
                                        <input type="text" class="form-control form-control-sm" id="edit-tujuan" name="tujuan" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-end pe-3">Keperluan:</th>
                                    <td class="border-start">
                                        <textarea class="form-control form-control-sm" id="edit-keperluan" name="keperluan" rows="2" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-end pe-3">Status:</th>
                                    <td class="border-start">
                                        <select class="form-control form-control-sm" id="edit-status" name="status_perjalanan" required>
                                            <option value="berjalan">Berjalan</option>
                                            <option value="selesai">Selesai</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-end pe-3">Waktu Berangkat:</th>
                                    <td class="border-start">
                                        <input type="datetime-local" class="form-control form-control-sm" id="edit-waktu_berangkat" name="waktu_berangkat" required>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-end pe-3">KM Berangkat:</th>
                                    <td class="border-start">
                                        <input type="number" class="form-control form-control-sm" id="edit-km_berangkat" name="km_berangkat" required>
                                    </td>
                                </tr>
                                <tr id="edit-row-kembali" style="display: none;">
                                    <th class="text-end pe-3">Waktu Kembali:</th>
                                    <td class="border-start">
                                        <input type="datetime-local" class="form-control form-control-sm" id="edit-waktu_kembali" name="waktu_kembali">
                                    </td>
                                </tr>
                                <tr id="edit-row-km-kembali" style="display: none;">
                                    <th class="text-end pe-3">KM Kembali:</th>
                                    <td class="border-start">
                                        <input type="number" class="form-control form-control-sm" id="edit-km_kembali" name="km_kembali">
                                    </td>
                                </tr>
                                <tr id="edit-row-catatan" style="display: none;">
                                    <th class="text-end pe-3">Catatan:</th>
                                    <td class="border-start">
                                        <textarea class="form-control form-control-sm" id="edit-catatan" name="catatan" rows="2"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editModal = document.getElementById('editRiwayatModal');
    const editForm = document.getElementById('editRiwayatForm');
    
    editModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const riwayatData = JSON.parse(button.getAttribute('data-riwayat'));
        
        // Set form action
        editForm.action = `/riwayat-ambulans/${riwayatData.id}`;
        
        // Format datetime untuk input
        const formatDateTime = (dateString) => {
            const date = new Date(dateString);
            return date.toISOString().slice(0, 16);
        };
        
        // Isi form dengan data
        document.getElementById('edit-ambulans_id').value = riwayatData.ambulans_id;
        document.getElementById('edit-tujuan').value = riwayatData.tujuan;
        document.getElementById('edit-keperluan').value = riwayatData.keperluan;
        document.getElementById('edit-status').value = riwayatData.status_perjalanan;
        document.getElementById('edit-waktu_berangkat').value = formatDateTime(riwayatData.waktu_berangkat);
        document.getElementById('edit-km_berangkat').value = riwayatData.km_berangkat;
        
        // Tampilkan field kembali jika status selesai
        const showKembali = riwayatData.status_perjalanan === 'selesai';
        toggleEditKembaliFields(showKembali);
        
        if (showKembali && riwayatData.waktu_kembali) {
            document.getElementById('edit-waktu_kembali').value = formatDateTime(riwayatData.waktu_kembali);
            document.getElementById('edit-km_kembali').value = riwayatData.km_kembali;
        }
        
        // Tampilkan catatan jika ada
        if (riwayatData.catatan) {
            document.getElementById('edit-row-catatan').style.display = '';
            document.getElementById('edit-catatan').value = riwayatData.catatan;
        } else {
            document.getElementById('edit-row-catatan').style.display = 'none';
        }
        
        // Update judul modal
        document.getElementById('editRiwayatModalLabel').textContent = 
            `Edit Perjalanan ${riwayatData.ambulans.nopol}`;
    });
    
    // Toggle field kembali berdasarkan status
    document.getElementById('edit-status').addEventListener('change', function() {
        toggleEditKembaliFields(this.value === 'selesai');
    });
    
    function toggleEditKembaliFields(show) {
        document.getElementById('edit-row-kembali').style.display = show ? '' : 'none';
        document.getElementById('edit-row-km-kembali').style.display = show ? '' : 'none';
        
        const waktuKembali = document.getElementById('edit-waktu_kembali');
        const kmKembali = document.getElementById('edit-km_kembali');
        
        if (show) {
            waktuKembali.setAttribute('required', 'required');
            kmKembali.setAttribute('required', 'required');
        } else {
            waktuKembali.removeAttribute('required');
            kmKembali.removeAttribute('required');
        }
    }
});
</script>