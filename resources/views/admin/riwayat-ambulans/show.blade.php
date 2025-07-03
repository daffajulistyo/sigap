<!-- Modal Show Riwayat Ambulans -->
<div class="modal fade" id="showRiwayatModal" tabindex="-1" aria-labelledby="showRiwayatModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showRiwayatModalLabel">Detail Riwayat Ambulans</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th width="30%" class="text-end pe-3">Ambulans:</th>
                                <td class="border-start">
                                    <span id="show-ambulans"></span><br>
                                    <small id="show-puskesmas" class="text-muted"></small>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Tujuan:</th>
                                <td id="show-tujuan" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Keperluan:</th>
                                <td id="show-keperluan" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Status Perjalanan:</th>
                                <td id="show-status" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Waktu Berangkat:</th>
                                <td id="show-berangkat" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">KM Berangkat:</th>
                                <td id="show-km-berangkat" class="border-start"></td>
                            </tr>
                            <tr id="row-kembali" style="display: none;">
                                <th class="text-end pe-3">Waktu Kembali:</th>
                                <td id="show-kembali" class="border-start"></td>
                            </tr>
                            <tr id="row-km-kembali" style="display: none;">
                                <th class="text-end pe-3">KM Kembali:</th>
                                <td id="show-km-kembali" class="border-start"></td>
                            </tr>
                            <tr id="row-km-tempuh" style="display: none;">
                                <th class="text-end pe-3">KM Tempuh:</th>
                                <td id="show-km-tempuh" class="border-start"></td>
                            </tr>
                            <tr id="row-catatan" style="display: none;">
                                <th class="text-end pe-3">Catatan:</th>
                                <td id="show-catatan" class="border-start"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const showModal = document.getElementById('showRiwayatModal');
    
    showModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const riwayatData = JSON.parse(button.getAttribute('data-riwayat'));
        
        // Format data
        const waktuBerangkat = new Date(riwayatData.waktu_berangkat);
        const waktuKembali = riwayatData.waktu_kembali ? new Date(riwayatData.waktu_kembali) : null;
        
        // Isi data ke dalam modal
        document.getElementById('show-ambulans').textContent = 
            `${riwayatData.ambulans.nomor_polisi} - ${riwayatData.ambulans.merk} (${riwayatData.ambulans.tahun})`;
        document.getElementById('show-puskesmas').textContent = riwayatData.ambulans.puskesmas.nama;
        document.getElementById('show-tujuan').textContent = riwayatData.tujuan;
        document.getElementById('show-keperluan').textContent = riwayatData.keperluan;
        
        // Status dengan badge
        const statusBadge = riwayatData.status_perjalanan === 'berjalan' ? 
            '<span class="badge bg-warning text-dark">Berjalan</span>' : 
            '<span class="badge bg-success">Selesai</span>';
        document.getElementById('show-status').innerHTML = statusBadge;
        
        // Waktu dan KM
        document.getElementById('show-berangkat').textContent = 
            waktuBerangkat.toLocaleDateString('id-ID', { 
                weekday: 'long', 
                day: 'numeric', 
                month: 'long', 
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        document.getElementById('show-km-berangkat').textContent = 
            riwayatData.km_berangkat.toLocaleString('id-ID') + ' km';
        
        // Tampilkan data kembali jika ada
        const showKembali = riwayatData.status_perjalanan === 'selesai' && riwayatData.waktu_kembali;
        if (showKembali) {
            document.getElementById('row-kembali').style.display = '';
            document.getElementById('row-km-kembali').style.display = '';
            document.getElementById('row-km-tempuh').style.display = '';
            
            document.getElementById('show-kembali').textContent = 
                waktuKembali.toLocaleDateString('id-ID', { 
                    weekday: 'long', 
                    day: 'numeric', 
                    month: 'long', 
                    year: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
            document.getElementById('show-km-kembali').textContent = 
                riwayatData.km_kembali.toLocaleString('id-ID') + ' km';
            document.getElementById('show-km-tempuh').textContent = 
                (riwayatData.km_kembali - riwayatData.km_berangkat).toLocaleString('id-ID') + ' km';
        } else {
            document.getElementById('row-kembali').style.display = 'none';
            document.getElementById('row-km-kembali').style.display = 'none';
            document.getElementById('row-km-tempuh').style.display = 'none';
        }
        
        // Tampilkan catatan jika ada
        if (riwayatData.catatan) {
            document.getElementById('row-catatan').style.display = '';
            document.getElementById('show-catatan').textContent = riwayatData.catatan;
        } else {
            document.getElementById('row-catatan').style.display = 'none';
        }
        
        // Update judul modal
        document.getElementById('showRiwayatModalLabel').textContent = 
            `Detail Perjalanan ${riwayatData.ambulans.nomor_polisi}`;
            
        // Set link edit
        document.getElementById('edit-button').href = `/riwayat-ambulans/${riwayatData.id}/edit`;
    });
});
</script>