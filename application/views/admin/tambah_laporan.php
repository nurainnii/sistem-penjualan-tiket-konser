<div class="flex-1 p-4 md:p-6 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Tambah Lokasi Baru</h1>
            <p class="text-gray-400">Isi detail Laporan di bawah ini.</p>
        </div>
        <a href="<?= site_url('admin/mnj_laporan/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Laporan
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form action="<?= base_url('admin/mnj_laporan/tambah') ?>" method="POST">
            <div class="mb-6">
                <label for="konserSelect" class="form-label">Nama Konser</label>
        <select id="konserSelect" name="id_konser" class="form-input w-full" required>
            <option value="">-- Pilih Konser --</option>
            
            <?php foreach ($laporan_data as $item): ?>
                <option 
                    value="<?= $item->id_konser ?>" 
                    data-terjual="<?= $item->total_terjual ?>" 
                    data-pendapatan="<?= $item->total_pendapatan ?>">
                    <?= $item->nama_konser ?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>

    <div class="mb-6">
        <label for="totalTerjual" class="form-label">Total Terjual</label>
        <input type="number" id="totalTerjual" name="total_terjual" class="form-input w-full" placeholder="Akan terisi otomatis" readonly required>
    </div>

    <div class="mb-6">
        <label for="totalPendapatan" class="form-label">Total Pendapatan</label>
        <input type="number" id="totalPendapatan" name="total_pendapatan" class="form-input w-full" placeholder="Akan terisi otomatis" readonly required>
    </div>

    <div class="mb-6">
        <label for="tanggalLaporan" class="form-label">Tanggal Laporan</label>
        <input type="date" id="tanggalLaporan" name="tanggal_laporan" class="form-input w-full" value="<?= date('Y-m-d') ?>" readonly required>
    </div>
            <div class="flex justify-end space-x-3 mt-8">
                <button type="reset" class="btn-outline px-6 py-2.5 rounded-lg text-sm">
                    Reset
                </button>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg text-sm font-medium flex items-center">
                    <i class="fas fa-plus mr-2"></i>Tambah Laporan
                </button>
            </div>
            <script>
    // Pastikan script berjalan setelah semua elemen HTML dimuat
    document.addEventListener('DOMContentLoaded', function() {
        
        // Ambil elemen-elemen yang dibutuhkan
        const konserSelect = document.getElementById('konserSelect');
        const totalTerjualInput = document.getElementById('totalTerjual');
        const totalPendapatanInput = document.getElementById('totalPendapatan');

        // Tambahkan event listener untuk mendeteksi perubahan pada dropdown
        konserSelect.addEventListener('change', function() {
            // Dapatkan option yang sedang dipilih
            const selectedOption = this.options[this.selectedIndex];

            // Jika pilihan bukan "-- Pilih Konser --"
            if (this.value) {
                // Ambil data dari atribut data-*
                const terjual = selectedOption.dataset.terjual;
                const pendapatan = selectedOption.dataset.pendapatan;

                // Masukkan data ke dalam input field
                totalTerjualInput.value = terjual;
                totalPendapatanInput.value = pendapatan;
            } else {
                // Jika "-- Pilih Konser --" dipilih, kosongkan input field
                totalTerjualInput.value = '';
                totalPendapatanInput.value = '';
            }
        });

    });
</script>

        </form>
    </div>
</div>