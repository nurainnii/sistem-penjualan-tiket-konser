<div class="flex-1 p-4 md:p-6 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold"><?= isset($kategori) ? 'Edit' : 'Tambah' ?> Kategori Tiket</h1>
            <p class="text-gray-400">Isi detail Kategori di bawah ini.</p>
        </div>
        <a href="<?= site_url('admin/mnj_kategori/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Kategori
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form method="POST">
            <div class="mb-6">
                <label for="nama_tempat" class="form-label">Nama Konser</label>
                <select id="kota" name="id_konser" class="form-input w-full" required>
                    <option value="">-- Pilih Konser --</option>
                <?php foreach ($konser as $k): ?>
                    <option value="<?= $k->id_konser ?>" <?= isset($kategori) && $kategori->id_konser == $k->id_konser ? 'selected' : '' ?>>
                        <?= $k->nama_konser ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

             <div class="mb-6">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-input w-full" value="<?= @$kategori->nama_kategori ?>" required>
            </div>

            <div class="mb-6">
                <label class="form-label">Harga</label>
                <input type="number" name="harga" class="form-input w-full" value="<?= @$kategori->harga ?>" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" class="form-input w-full" value="<?= @$kategori->stok ?>" required>
            </div>
            
            <div class="flex justify-end space-x-3 mt-8">
                <button type="reset" class="btn-outline px-6 py-2.5 rounded-lg text-sm">
                    Reset
                </button>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg text-sm font-medium flex items-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Kategori
                </button>
            </div>
        </form>
    </div>
</div>