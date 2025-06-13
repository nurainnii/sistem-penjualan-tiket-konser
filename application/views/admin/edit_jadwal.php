<div class="flex-1 p-4 md:p-6 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Edit Jadwal</h1>
            <p class="text-gray-400">Isi detail tempat di bawah ini.</p>
        </div>
        <a href="<?= site_url('admin/mnj_jadwal/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Tempat
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form action="<?= site_url('admin/mnj_jadwal/edit/' . $jadwal->id_jadwal) ?>" method="POST">
            <div class="mb-6">
                <label for="nama_tempat" class="form-label">Nama Konser</label>
                <select id="kota" name="id_konser" class="form-input w-full" required>
                    <option value="">-- Pilih Konser --</option>
                <?php foreach($konser as $k): ?>
                    <option value="<?= $k->id_konser ?>" 
                        <?= (isset($jadwal) && $jadwal->id_konser == $k->id_konser) ? 'selected' : '' ?>>
                        <?= $k->nama_konser ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-6">
                <label for="nama_tempat" class="form-label">Lokasi</label>
                <select id="kota" name="id_lokasi" class="form-input w-full" required>
                    <option value="">-- Pilih Lokasi --</option>
                <?php foreach($lokasi as $l): ?>
                    <option value="<?= $l->id_lokasi ?>" 
                        <?= (isset($jadwal) && $jadwal->id_lokasi == $l->id_lokasi) ? 'selected' : '' ?>>
                        <?= $l->nama_tempat ?> - <?= $l->kota ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="mb-6">
                <label for="tanggal_acara" class="form-label">Tanggal Acara</label>
                <input type="date" id="tanggal_acara" name="tanggal" value="<?= @$jadwal->tanggal ?>" class="form-input w-full">
            </div>
            <div class="mb-6">
                <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                <input type="time" id="waktu_mulai" name="waktu" value="<?= @$jadwal->waktu ?>" class="form-input w-full">
            </div>

            <div class="flex justify-end space-x-3 mt-8">
                <button type="reset" class="btn-outline px-6 py-2.5 rounded-lg text-sm">
                    Reset
                </button>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg text-sm font-medium flex items-center">
                    <i class="fas fa-plus mr-2"></i>Edit Jadwal
                </button>
            </div>
        </form>
    </div>
</div>