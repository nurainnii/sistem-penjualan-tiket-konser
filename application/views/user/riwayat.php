<div class="container mx-auto p-4 md:p-8">
    <h1 class="text-2xl md:text-3xl font-bold text-[#1DCD9F] dark:text-gray-100 mb-6">
        Riwayat Pemesanan Tiket
    </h1>

    <?php if (!empty($riwayat_tiket)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <?php foreach($riwayat_tiket as $t): ?>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 flex flex-col overflow-hidden">
                    
                    <div class="p-5 border-b border-gray-200 dark:border-gray-700">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-lg text-gray-900 dark:text-white">
                                <?= htmlspecialchars($t->nama_konser) ?>
                            </h3>
                            <?php
                                $status_asli = strtolower($t->status);
                                if ($status_asli == 'dibayar' || $status_asli == 'selesai') {
                                    echo '<span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">Dibayar</span>';
                                } elseif ($status_asli == 'dipesan' || $status_asli == 'menunggu konfirmasi') {
                                    echo '<span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">Belum Dibayar</span>';
                                } else {
                                    echo '<span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">' . ucfirst($status_asli) . '</span>';
                                }
                            ?>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            <?= htmlspecialchars($t->nama_kategori) ?>
                        </p>
                    </div>

                    <div class="p-5 space-y-2 text-sm text-gray-600 dark:text-gray-300 flex-grow">
                        <p><strong>Jumlah:</strong> <?= intval($t->jumlah) ?> Tiket</p>
                        <p><strong>Tanggal Pesan:</strong> <?= date('d M Y, H:i', strtotime($t->tanggal_pesan)) ?></p>
                    </div>

                    <div class="p-4 bg-gray-50 dark:bg-gray-900/50 text-right border-t border-gray-200 dark:border-gray-700">
                         <?php
                            // Logika untuk tombol/link aksi
                            if ($status_asli == 'dibayar' || $status_asli == 'selesai') {
                                echo '<a href="'.site_url('user/tiket/detail/' . $t->id_tiket).'" class="text-gray-600 font-semibold hover:underline">Lihat E-Tiket</a>';
                            } elseif ($status_asli == 'dipesan' || $status_asli == 'menunggu konfirmasi') {
                                echo '<a href="'.site_url('user/pembayaran/index/' . $t->id_tiket).'" class="text-gray-600 font-semibold hover:underline">Bayar / Cek Status</a>';
                            }
                        ?>
                    </div>
                </div>
                <?php endforeach; ?>

        </div>
    <?php else: ?>
        <div class="text-center py-12 px-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <p class="text-gray-500 dark:text-gray-400">Anda belum memiliki riwayat pemesanan.</p>
        </div>
    <?php endif; ?>

</div>