<div class="flex-1 p-4 md:p-6 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Tambah Lokasi Baru</h1>
            <p class="text-gray-400">Isi detail Lokasi di bawah ini.</p>
        </div>
        <a href="<?= site_url('admin/mnj_lokasi/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Lokasi
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form action="<?= site_url('admin/mnj_lokasi/tambah') ?>" method="POST">
            <div class="mb-6">
                <label for="nama_tempat" class="form-label">Nama Lokasi</label>
                <input type="text" id="nama_tempat" name="nama_tempat" class="form-input w-full" placeholder="Contoh: Stadion Gelora Jaya" required>
            </div>

            <div class="mb-6">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea id="alamat" name="alamat" rows="4" class="form-input w-full" placeholder="Masukkan alamat lengkap tempat"></textarea>
            </div>

            <div class="mb-6">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" id="kota" name="kota" class="form-input w-full" placeholder="Contoh: Jakarta" required>
            </div>

            <div class="flex justify-end space-x-3 mt-8">
                <button type="reset" class="btn-outline px-6 py-2.5 rounded-lg text-sm">
                    Reset
                </button>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg text-sm font-medium flex items-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Lokasi
                </button>
            </div>
        </form>
    </div>
</div>