<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl overflow-hidden">
    <div class="relative h-60">
        <img src="<?php echo base_url('./uploads/konser/' . $konser->gambar); ?>" 
             alt="<?php echo $konser->nama_konser; ?>" 
             class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-[rgba(22,153,118,0.7)] to-[rgba(0,0,0,0.8)] z-10"></div>
        <div class="absolute bottom-0 p-6 w-full z-20">
            <h1 class="text-3xl font-bold text-white drop-shadow-lg"><?php echo $konser->nama_konser; ?></h1>
        </div>
    </div>

    <div class="p-6 bg-white">
        <div class="lokasi-info" style="margin-top: 15px; padding: 10px; border: 1px solid #eee; border-radius: 5px;">
            <i class="fas fa-map-marker-alt text-gray-600 mr-2"></i><strong class="text-black"><?php echo htmlspecialchars($jadwal_kategori[0]->nama_tempat); ?></strong><br>
            <small class="text-gray-800"><?php echo htmlspecialchars($jadwal_kategori[0]->alamat); ?></small>
        </div>
        <p class="text-gray-800 mb-6 leading-relaxed"><?php echo $konser->deskripsi; ?></p>

        <hr class="my-6 border-gray-300">

        <h3 style="text-align: center;" class="text-xl font-bold mb-4 text-[#169976]">Pesan Tiket</h3>
        <form action="<?php echo site_url('user/booking/proses_booking'); ?>" method="post" class="space-y-5">
            <input type="hidden" name="id_konser" value="<?php echo $konser->id_konser; ?>">

            <div>
                <label for="id_jadwal" class="block mb-1 font-medium text-gray-800">Pilih Jadwal:</label>
                <select name="id_jadwal" required
                    class="w-full text-gray-800 p-2 border border-gray-300 rounded-lg focus:ring-[#1DCD9F] focus:outline-none">
                    <option value="" disabled selected>-Pilih-</option>
                    <?php 
                        $jadwal_displayed = [];
                        foreach($jadwal_kategori as $item) {
                            if(!in_array($item->id_jadwal, $jadwal_displayed)) {
                                echo "<option value='{$item->id_jadwal}'>{$item->tanggal} - {$item->nama_tempat}</option>";
                                $jadwal_displayed[] = $item->id_jadwal;
                            }
                        }
                    ?>
                </select>
            </div>

            <div>
                <label for="id_kategori" class="block mb-1 font-medium text-gray-800">Pilih Kategori Tiket:</label>
                <select id="kategori-tiket" name="id_kategori" required
                    class="w-full p-2 border text-gray-800 border-gray-300 rounded-lg focus:ring-[#1DCD9F] focus:outline-none">
                    <option value="" disabled selected>-Pilih-</option>
                     <?php foreach($jadwal_kategori as $item): ?>
                        <option 
                            value="<?php echo $item->id_kategori; ?>" 
                            data-harga="<?php echo $item->harga; ?>"
                            data-nama="<?php echo htmlspecialchars($item->nama_kategori); ?>">
                            <?php echo htmlspecialchars($item->nama_kategori) . " - Rp " . number_format($item->harga); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <input type="hidden" name="harga" id="harga" value="<?php echo $jadwal_kategori[0]->harga; ?>">

            <div>
                <label for="jumlah" class="block mb-1 font-medium text-gray-800">Jumlah Tiket:</label>
                <input type="number" id="jumlah-tiket" name="jumlah" value="1" min="1" required
                    class="w-full p-2 border border-gray-300 text-gray-800 rounded-lg focus:ring-[#1DCD9F] focus:outline-none">
            </div>

            <div>
                <button type="submit" id="tombol-pesan"
                    class="w-full bg-[#1DCD9F] hover:bg-[#169976] text-white font-semibold py-2 rounded-lg shadow-md transition duration-200">
                    Pesan Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const selectKategori = document.getElementById('kategori-tiket');
    const inputJumlah = document.getElementById('jumlah-tiket');
    const tombolPesan = document.getElementById('tombol-pesan');

    const namaKonser = "<?php echo addslashes($konser->nama_konser); ?>";

    function perbaruiPesanKonfirmasi() {
        const pilihan = selectKategori.options[selectKategori.selectedIndex];
        const namaKategori = pilihan.getAttribute('data-nama');
        const hargaSatuan = pilihan.getAttribute('data-harga');
        const jumlah = inputJumlah.value; 

        const jumlahValid = Math.max(1, parseInt(jumlah) || 1); 
        const totalHarga = jumlahValid * hargaSatuan; 
        
        const totalHargaFormatted = new Intl.NumberFormat('id-ID').format(totalHarga);

        const pesan = `Lanjutkan pembelian ${jumlahValid} tiket Konser ${namaKonser} (${namaKategori}) dengan total harga Rp ${totalHargaFormatted}?`;
        
        tombolPesan.setAttribute('onclick', `return confirm('${pesan}');`);
    }

    selectKategori.addEventListener('change', perbaruiPesanKonfirmasi);

    inputJumlah.addEventListener('input', perbaruiPesanKonfirmasi); 

    document.addEventListener('DOMContentLoaded', perbaruiPesanKonfirmasi);
</script>