<!-- Modal untuk Show Data -->
<div class="modal fade" id="showPuskesmasModal" tabindex="-1" aria-labelledby="showPuskesmasModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showPuskesmasModalLabel">Detail Puskesmas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr>
                                <th width="30%" class="text-end pe-3">Kode Puskesmas:</th>
                                <td id="show-kode" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Nama Puskesmas:</th>
                                <td id="show-nama" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Alamat Lengkap:</th>
                                <td id="show-alamat" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Kecamatan:</th>
                                <td id="show-kecamatan" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Desa/Kelurahan:</th>
                                <td id="show-desa" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Nomor Telepon:</th>
                                <td id="show-telepon" class="border-start"></td>
                            </tr>
                            <tr>
                                <th class="text-end pe-3">Koordinat:</th>
                                <td id="show-koordinat" class="border-start"></td>
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
    const showModal = document.getElementById('showPuskesmasModal');

    showModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const puskesmasData = JSON.parse(button.getAttribute('data-puskesmas'));

        // Isi data ke dalam modal
        document.getElementById('show-kode').textContent = puskesmasData.kode_puskesmas;
        document.getElementById('show-nama').textContent = puskesmasData.nama;
        document.getElementById('show-alamat').textContent = puskesmasData.alamat;
        document.getElementById('show-kecamatan').textContent = puskesmasData.kecamatan;
        document.getElementById('show-desa').textContent = puskesmasData.desa;
        document.getElementById('show-telepon').textContent = puskesmasData.nomor_telepon || '-';
        document.getElementById('show-koordinat').textContent = `${puskesmasData.latitude}, ${puskesmasData.longitude}`;

        // Update judul modal
        document.getElementById('showPuskesmasModalLabel').textContent = `Detail ${puskesmasData.nama}`;

        // Set link edit
        document.getElementById('edit-button').href = `/puskesmas/${puskesmasData.id}/edit`;
    });
});
</script>
