<div class="flex-1 p-4 md:p-6 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">
                Edit Konser:
                <span class="text-primary"> <?= htmlspecialchars(isset($konser['nama_konser']) ? $konser['nama_konser'] : 'Data Konser') ?></span>
            </h1>
            <p class="text-gray-400">Perbarui detail konser di bawah ini.</p>
        </div>
        <a href="<?= site_url('admin/mnj_konser/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Konser
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form action="<?= site_url('admin/mnj_konser/update/' . (isset($konser['id_konser']) ? $konser['id_konser'] : '')) ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_konser" value="<?= isset($konser['id_konser']) ? htmlspecialchars($konser['id_konser']) : '' ?>">
            <input type="hidden" name="gambar_lama" value="<?= isset($konser['gambar']) ? htmlspecialchars($konser['gambar']) : '' ?>">

            <div class="mb-6">
                <label for="nama_konser" class="form-label">Nama Konser</label>
                <input type="text" id="nama_konser" name="nama_konser" class="form-input w-full" placeholder="Masukkan nama konser"
                       value="<?= htmlspecialchars(isset($konser['nama_konser']) ? $konser['nama_konser'] : '') ?>" required>
            </div>

            <div class="mb-6">
                <label for="deskripsi" class="form-label">Deskripsi Konser</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" class="form-input w-full"
                          placeholder="Deskripsikan konser lebih detail..."><?= htmlspecialchars(isset($konser['deskripsi']) ? $konser['deskripsi'] : '') ?></textarea>
            </div>

            <div class="mb-6">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-input w-full" required>
                    <option value="aktif" <?= (isset($konser['status']) && $konser['status'] == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="nonaktif" <?= (isset($konser['status']) && $konser['status'] == 'nonaktif') ? 'selected' : '' ?>>Nonaktif</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="gambar" class="form-label">Upload Gambar Konser Baru</label>
                <?php if (isset($konser['gambar']) && !empty($konser['gambar'])): ?>
                    <div class="mb-3">
                        <p class="text-sm text-gray-400 mb-1">Gambar Saat Ini:</p>
                        <img src="<?= base_url('uploads/konser/' . htmlspecialchars($konser['gambar'])) ?>" alt="Gambar <?= htmlspecialchars($konser['nama_konser']) ?>" class="w-40 h-auto object-cover rounded-lg border border-gray-600">
                    </div>
                <?php endif; ?>
                <input type="file" id="gambar" name="gambar"
                       class="block w-full text-sm text-gray-400
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-[var(--primary)] file:text-white
                              hover:file:bg-primary-dark
                              cursor-pointer border border-gray-600 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                       accept="image/png,image/jpeg,image/gif,image/webp">
                <p class="mt-1 text-xs text-gray-500">Kosongkan jika tidak ingin mengganti gambar. Format: PNG, JPG, GIF, WEBP. Maks 2MB.</p>
            </div>

            <div class="flex justify-end space-x-3 mt-8">
                <a href="<?= site_url('admin/mnj_konser/') ?>" class="btn-outline px-6 py-2.5 rounded-lg text-sm">
                    Batal
                </a>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg text-sm font-medium flex items-center">
                    <i class="fas fa-save mr-2"></i>Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>