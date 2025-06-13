<div class="container mx-auto p-4 md:p-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-xl border border-gray-200 overflow-hidden">
        
        <div class="bg-gray-800 text-white p-6 text-center">
            <h1 class="text-3xl font-bold"><?php echo htmlspecialchars($booking->nama_konser); ?></h1>
            <p class="text-lg text-gray-300 mt-1">E-TICKET</p>
        </div>

        <div class="p-6 md:p-8">
            <div class="flex justify-center mb-6">
                <img src="<?php echo $qr_code; ?>" alt="QR Code Tiket" class="w-48 h-48">
            </div>

            <div class="text-center mb-6">
                <p class="text-gray-500">ID Booking</p>
                <p class="text-2xl font-mono font-bold text-gray-800"><?php echo htmlspecialchars($booking->id_booking); ?></p>
                <span class="inline-block px-4 py-1 bg-green-200 text-green-800 rounded-full text-sm font-semibold mt-2">
                    PEMBAYARAN LUNAS
                </span>
            </div>

            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Detail Pemesan</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <p class="font-medium text-gray-500">Nama</p>
                        <p><?php echo htmlspecialchars($nama); ?></p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-500">Email</p>
                        <p><?php echo htmlspecialchars($email); ?></p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Detail Tiket</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <p class="font-medium text-gray-500">Kategori Tiket</p>
                        <p><?php echo htmlspecialchars($booking->nama_kategori); ?></p>
                    </div>
                     <div>
                        <p class="font-medium text-gray-500">Jumlah</p>
                        <p><?php echo htmlspecialchars($booking->jumlah); ?> Tiket</p>
                    </div>
                </div>
            </div>

             <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Jadwal & Lokasi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-600">
                    <div>
                        <p class="font-medium text-gray-500">Tanggal & Waktu</p>
                        <p><?php echo date('d F Y', strtotime($booking->tanggal)); ?> pukul <?php echo date('H:i', strtotime($booking->waktu)); ?> WIB</p>
                    </div>
                     <div>
                        <p class="font-medium text-gray-500">Tempat</p>
                        <p><?php echo htmlspecialchars($booking->nama_tempat); ?><br><span class="text-sm"><?php echo htmlspecialchars($booking->alamat); ?></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 p-6 text-center text-sm text-gray-500 border-t border-gray-200">
            <p>Tunjukkan QR Code ini kepada petugas di pintu masuk. Dilarang menyebarluaskan e-tiket ini.</p>
            <p>Jika ada Masalah, Lapor pada Form Report.</p>
        </div>
    </div>
</div>