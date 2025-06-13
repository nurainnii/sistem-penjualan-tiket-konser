<div class="flex-1 p-4 md:p-6 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Balas Report: <span style="color: #FFB433;"><?= $laporan->nama ?></span></h1>
            <p class="text-gray-400">Berikan Informasi Report di bawah ini.</p>
        </div>
        <a href="<?= site_url('admin/mnj_report/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Report
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form action="<?= site_url('admin/mnj_report/balas/'.$laporan->id_report) ?>" method="POST">

    <div class="mb-6">
        <label for="totalTerjual" class="form-label">Judul</label>
        <input type="text" value="<?= $laporan->judul_report ?>" class="form-input w-full" placeholder="Akan terisi otomatis" readonly required>
    </div>
    <div class="mb-6">
        <label for="totalPendapatan" class="form-label">Isi</label>
        <input type="text" value="<?= $laporan->isi_report ?>" class="form-input w-full" placeholder="Akan terisi otomatis" readonly required>
    </div>
    <div class="mb-6">
    <label  class="form-label">Status</label>
        <select name="status" class="form-input w-full" required>
            <option value="pending" <?= $laporan->status == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="ditangani" <?= $laporan->status == 'ditangani' ? 'selected' : '' ?>>Ditangani</option>
            <option value="selesai" <?= $laporan->status == 'selesai' ? 'selected' : '' ?>>Selesai</option>
        </select>
    </div>
            <div class="mb-6">
                <label class="form-label">Balas</label>
                <textarea name="balasan_admin" rows="4" class="form-input w-full" placeholder="Masukkan Balasan Admin"><?= $laporan->balasan_admin ?></textarea>
            </div>

            <div class="flex justify-end space-x-3 mt-8">
                <button type="reset" class="btn-outline px-6 py-2.5 rounded-lg text-sm">
                    Reset
                </button>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg text-sm font-medium flex items-center">
                    <i class="fa-solid fa-paper-plane mr-2"></i>Kirim
                </button>
            </div>
        </form>
    </div>
</div>