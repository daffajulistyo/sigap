<div class="modal fade" id="showAmbulansModal" tabindex="-1" aria-labelledby="showAmbulansModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showAmbulansModalLabel">Detail Ambulans</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" class="text-end pe-3">Nomor Polisi:</th>
                                <td id="show-nomor-polisi" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Merk & Tahun:</th>
                                <td id="show-merk-tahun" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Puskesmas:</th>
                                <td id="show-puskesmas" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Status:</th>
                                <td id="show-status" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Nomor Mesin:</th>
                                <td id="show-nomor-mesin" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Nomor Rangka:</th>
                                <td id="show-nomor-rangka" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">KM Terakhir:</th>
                                <td id="show-km-terakhir" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Keterangan:</th>
                                <td id="show-keterangan" class="border-start"></td>
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
    const showModal = document.getElementById('showAmbulansModal');

    showModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const ambulansData = JSON.parse(button.getAttribute('data-ambulan'));

        // Isi data ke dalam modal
        document.getElementById('show-nomor-polisi').textContent = ambulansData.nomor_polisi;
        document.getElementById('show-merk-tahun').textContent = `${ambulansData.merk} (${ambulansData.tahun})`;
        document.getElementById('show-puskesmas').textContent = ambulansData.puskesmas.nama;
        document.getElementById('show-status').innerHTML =
            `<span class="badge ${ambulansData.status == 'standby' ? 'bg-success' :
              ambulansData.status == 'dinas' ? 'bg-warning text-dark' : 'bg-danger'}">
              ${ambulansData.status.charAt(0).toUpperCase() + ambulansData.status.slice(1)}
             </span>`;
        document.getElementById('show-nomor-mesin').textContent = ambulansData.nomor_mesin || '🚑';
        document.getElementById('show-nomor-rangka').textContent = ambulansData.nomor_rangka || '🚑';
        document.getElementById('show-km-terakhir').textContent = ambulansData.km_terakhir;
        document.getElementById('show-keterangan').textContent = ambulansData.keterangan || '🚑';

        // Update judul modal
        document.getElementById('showAmbulansModalLabel').textContent = `Detail ${ambulansData.nomor_polisi}`;

        // Set link edit
        document.getElementById('edit-button').href = `/ambulans/${ambulansData.id}/edit`;
    });
});
</script>
