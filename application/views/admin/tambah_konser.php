<div class="flex-1 p-4 md:p-6 md:ml-0 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold"><?= isset($konser) ? 'Edit' : 'Tambah' ?> Konser Baru</h1>
            <p class="text-gray-400">Isi detail konser di bawah ini.</p>
        </div>
        <a href="<?php echo site_url('admin/mnj_konser/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Konser
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form action="<?= site_url('admin/mnj_konser/simpan/') ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-6">
                <label for="concert_name" class="form-label">Nama Konser</label>
                <input type="text" name="nama_konser" id="concert_name" class="form-input w-full" placeholder="Masukkan Nama Konser" required>
            </div>

            <div class="mb-6">
                <label for="description" class="form-label">Deskripsi Konser</label>
                <textarea id="description" name="deskripsi" rows="4" class="form-input w-full" placeholder="Deskripsikan konser lebih detail..."></textarea>
            </div>

            <div class="mb-6">
                <label for="status" class="form-label">Status</label>
                <select id="status" name="status" class="form-input w-80" required>
                    <option value="" disabled selected>-Pilih Status Konser-</option>
                    <option value="aktif" <?= isset($konser) && $konser['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                    <option value="nonaktif" <?= isset($konser) && $konser['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="concert_image" class="form-label">Upload Gambar Poster Konser</label>
                <input type="file" id="concert_image" name="gambar"
                       class="block w-full text-sm text-gray-400
                              file:mr-4 file:py-2 file:px-4
                              file:rounded-lg file:border-0
                              file:text-sm file:font-semibold
                              file:bg-[var(--primary)]  file:text-white
                              hover:file:bg-primary-dark
                              cursor-pointer border border-gray-600 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                       accept="image/*" required>
                <p class="mt-1 text-xs text-gray-500">Format yang didukung: PNG, JPG, JPEG. Maksimal 2MB.</p>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="reset" class="btn-outline px-6 py-2.5 rounded-lg">
                    Reset
                </button>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg font-medium">
                    <i class="fas fa-plus mr-2"></i>Tambah Konser
                </button>
            </div>
        </form>
    </div>
</div>