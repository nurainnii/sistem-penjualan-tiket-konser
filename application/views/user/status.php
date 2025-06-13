<div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">
    <h1 class="text-2xl font-bold text-[#1DCD9F] mb-6">Status Pembayaran Anda</h1>

    <?php if ($booking): ?>
        <div class="space-y-3 text-gray-700">
            <p><strong>ID Booking:</strong> <?php echo htmlspecialchars($booking->id_booking); ?></p>
            <p><strong>Konser:</strong> <?php echo htmlspecialchars($booking->nama_konser); ?></p>
            <p>
                <strong>Status Pembayaran Saat Ini:</strong>
                <span class="font-semibold capitalize text-white px-2 py-1 rounded
                    <?php 
                        $status = strtolower($booking->status_pembayaran ?? 'pending');
                        echo $status === 'valid' ? 'bg-green-500' 
                            : ($status === 'pending' ? 'bg-yellow-500' 
                            : ($status === 'ditolak' ? 'bg-red-500' : 'bg-gray-400'));
                    ?>">
                    <?php echo ucfirst(htmlspecialchars($booking->status_pembayaran ?? 'Pending')); ?>
                </span>

            </p>
            <p>Terima kasih. Kami akan memverifikasi pembayaran Anda. Jika ada Masalah, Lapor pada Form Report.</p>
        </div>
    <?php else: ?>
        <p class="text-red-600 font-medium">Data pemesanan tidak ditemukan.</p>
    <?php endif; ?>

    <div class="mt-6">
        <a href="<?php echo site_url('user/tiket'); ?>" 
           class="inline-block bg-[#1DCD9F] hover:bg-[#169976] text-white font-semibold py-2 px-4 rounded-lg shadow transition duration-200">
            Lanjutkan
        </a>
    </div>
</div>
