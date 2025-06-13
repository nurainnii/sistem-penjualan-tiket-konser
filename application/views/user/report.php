<div class="container mx-auto p-4 md:p-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-[#1DCD9F] dark:text-gray-100">Pusat Laporan & Bantuan</h1>
        <a href="<?= site_url('user/report/tambah') ?>" class="bg-[#169976] hover:bg-[#1DCD9F] text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 flex items-center">
            <i class="fas fa-plus mr-2"></i> Buat Laporan Baru
        </a>
    </div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
            <p><?= $this->session->flashdata('success'); ?></p>
        </div>
    <?php endif; ?>

    <div class="space-y-6">
        <?php if (!empty($riwayat_laporan)): ?>
            <?php foreach ($riwayat_laporan as $laporan): ?>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700">
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-lg text-gray-900 dark:text-white"><?= htmlspecialchars($laporan->judul_report) ?></h3>
                            <div class="flex items-center space-x-3">
                                <?php
                                    $status = strtolower($laporan->status);
                                    $badge_class = 'bg-gray-200 text-gray-800'; 
                                    if ($status == 'ditangani') $badge_class = 'bg-blue-200 text-blue-800';
                                    if ($status == 'selesai') $badge_class = 'bg-green-200 text-green-800';
                                    if ($status == 'pending') $badge_class = 'bg-yellow-200 text-yellow-800';
                                ?>
                                <span class="px-2 py-1 <?= $badge_class ?> rounded-full text-xs font-semibold">
                                    <?= ucfirst($status) ?>
                                </span>

                                <?php 
                                    if ($status == 'pending'): 
                                ?>
                                    <a href="<?= site_url('user/report/hapus/' . $laporan->id_report) ?>" 
                                    class="text-red-500 hover:text-red-700 text-xs" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini? Aksi ini tidak bisa dibatalkan.');">
                                        <i class="fas fa-trash-alt"></i> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Dikirim pada: <?= date('d M Y, H:i', strtotime($laporan->tanggal_report)) ?></p>
                        
                        <p class="text-gray-700 dark:text-gray-300 mt-4">
                            <strong>Laporan Anda:</strong><br>
                            <?= nl2br(htmlspecialchars($laporan->isi_report)) ?>
                        </p>
                        
                        <?php if (!empty($laporan->balasan_admin)): ?>
                            <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                                <p class="font-semibold text-gray-800 dark:text-white">Balasan Admin:</p>
                                <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-700 rounded-md text-gray-700 dark:text-gray-300">
                                    <?= nl2br(htmlspecialchars($laporan->balasan_admin)) ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
        <?php else: ?>
            <div class="text-center py-12 px-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <p class="text-gray-500 dark:text-gray-400">Anda belum pernah membuat laporan.</p>
            </div>
        <?php endif; ?>
    </div>
</div>