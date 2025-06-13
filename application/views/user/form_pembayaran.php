<div class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h1 class="text-2xl font-bold text-[#1DCD9F] mb-4">Konfirmasi Pembayaran</h1>
    <div id="countdown-container" style="padding: 15px; border: 1px solid #ffc107; background-color: #fff3cd; text-align: center; margin-bottom: 20px;">
    <p style="margin: 0; font-weight: bold;" class="text-gray-600">Selesaikan pembayaran sebelum:</p>
    <h3 id="countdown" style="margin: 5px 0; color: #d9534f;"></h3>
</div>
    
    <!-- Detail Booking -->
    <div class="border border-gray-200 rounded-lg shadow-sm overflow-hidden mb-6">

    <div class="p-6 bg-white">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-3">Detail Pesanan Anda</h3>
        <div class="space-y-3 text-sm">
            <div class="flex justify-between">
                <dt class="text-gray-500">Konser:</dt>
                <dd class="font-medium text-gray-900 text-right"><?= htmlspecialchars($booking->nama_konser); ?></dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Jadwal:</dt>
                <dd class="font-medium text-gray-900 text-right">
                    <?php
                        $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
    $tanggal_formatted = $formatter->format(strtotime($booking->tanggal));
                        $waktu_formatted = date('H:i', strtotime($booking->waktu));
                        echo htmlspecialchars($tanggal_formatted . ' pukul ' . $waktu_formatted . ' WIB');
                    ?>
                </dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Kategori:</dt>
                <dd class="font-medium text-gray-900 text-right"><?= htmlspecialchars($booking->nama_kategori); ?></dd>
            </div>
            <div class="flex justify-between">
                <dt class="text-gray-500">Jumlah:</dt>
                <dd class="font-medium text-gray-900 text-right"><?= htmlspecialchars($booking->jumlah); ?> Tiket</dd>
            </div>
        </div>
    </div>

    <div class="p-6 bg-gray-50 border-t border-gray-200">
        <div class="flex justify-between items-center">
            <span class="text-base font-semibold text-gray-600">Total Tagihan</span>
            <span class="text-2xl font-bold text-[#169976]">
                Rp <?= number_format($booking->total_harga, 0, ',', '.'); ?>
            </span>
        </div>
    </div>

</div>
<div class="bg-blue-50 border-l-4 border-blue-400 text-blue-800 p-4 rounded-md" role="alert">
    <p class="font-bold mb-2">Informasi Pembayaran</p>
    <p>Silakan lakukan transfer ke nomor rekening berikut:</p>
    <div class="mt-2 bg-white p-3 rounded-lg border border-blue-200">
    <div class="flex justify-between items-center">
        <span id="nomor-rekening" class="text-xl font-mono font-semibold tracking-wider">0663407705</span>
        
        <button type="button" id="tombol-copy" class="bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-semibold py-1 px-3 rounded-lg transition duration-200">
            Salin
        </button>
    </div>
    <p class="text-sm mt-1">Bank BCA a.n. <strong>Siti Nurainni</strong></p>
</div>
</div>

    <hr class="my-6 border-gray-300">

    <!-- Form Upload -->
    <h3 class="text-xl font-semibold mb-4 text-[#169976]">🧾 Formulir Upload Bukti Bayar</h3>

    <?php if (isset($error)) : ?>
        <p class="text-red-600 font-medium mb-4"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="<?php echo site_url('user/pembayaran/proses'); ?>" method="post" enctype="multipart/form-data" class="space-y-4">
        <input type="hidden" name="id_tiket" value="<?php echo $booking->id_booking; ?>">

        <div>
            <label for="nama_pengirim" class="text-gray-800 block font-medium mb-1">Nama Pengirim (sesuai rekening):</label>
            <input type="text" name="nama_pengirim" required
                class="w-full p-2 border border-gray-300 rounded-lg bg-white text-gray-800 focus:ring-[#1DCD9F] focus:outline-none">
        </div>

        <div>
            <label for="bank" class="text-gray-800 block font-medium mb-1">Asal Bank:</label>
            <input type="text" name="bank" required
                class="w-full p-2 border border-gray-300 rounded-lg bg-white text-gray-800 focus:ring-[#1DCD9F] focus:outline-none">
        </div>

        <div>
            <label for="bukti_transfer" class="block font-medium mb-1">Upload Bukti Transfer (JPG/PNG):</label>
            <input type="file" name="bukti_transfer" required
                class="w-full p-2 border border-gray-300 rounded-lg bg-white text-gray-800 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-[#1DCD9F] file:text-white hover:file:bg-[#169976]">
        </div>

        <div>
            <button type="submit" 
                class="w-full bg-[#1DCD9F] hover:bg-[#169976] text-white font-semibold py-2 rounded-lg shadow-md transition duration-200">
                Konfirmasi & Kirim Bukti
            </button>
        </div>
    </form>
</div>

<script>
    var countDownDate = new Date("<?php echo $booking->waktu_kedaluwarsa; ?>").getTime();

    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("countdown").innerHTML = hours + "j " + minutes + "m " + seconds + "d ";

        if (distance < 0) {
            clearInterval(x);
            
            location.reload();
        }
    }, 1000);
</script>

<script>
    const tombolCopy = document.getElementById('tombol-copy');
    const nomorRekeningElement = document.getElementById('nomor-rekening');

    tombolCopy.addEventListener('click', function() {
        const nomorRekening = nomorRekeningElement.innerText;

        navigator.clipboard.writeText(nomorRekening).then(function() {
            
            tombolCopy.innerText = 'Disalin!';
            tombolCopy.classList.remove('bg-gray-200', 'hover:bg-gray-300');
            tombolCopy.classList.add('bg-green-500', 'text-white');

            setTimeout(function() {
                tombolCopy.innerText = 'Salin';
                tombolCopy.classList.remove('bg-green-500', 'text-white');
                tombolCopy.classList.add('bg-gray-200', 'hover:bg-gray-300');
            }, 2000); 

        }, function(err) {
            alert('Gagal menyalin nomor rekening. Mohon salin secara manual.');
            console.error('Gagal menyalin teks: ', err);
        });
    });
</script>