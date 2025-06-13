<?php
if ($this->session->flashdata('error')) {
    echo '<script>alert("' . addslashes($this->session->flashdata('error')) . '");</script>';
}
?>        
                    <div>
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Konser Populer</h2>
                            <a href="<?php echo site_url('user/booking') ?>" class="text-primary text-sm hover:underline">Lihat Semua</a>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($konser as $k): ?>
                            <div class="card overflow-hidden">
                                <div class="relative h-40 bg-cover bg-center" style="background-image: url('<?= base_url('./uploads/konser/' . $k->gambar) ?>');">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="opacity-20">
                                            <path d="M40 6.66666C21.6 6.66666 6.66667 21.6 6.66667 40C6.66667 58.4 21.6 73.3333 40 73.3333C58.4 73.3333 73.3333 58.4 73.3333 40C73.3333 21.6 58.4 6.66666 40 6.66666ZM33.3333 56.6667V23.3333L53.3333 40L33.3333 56.6667Z" fill="white"></path>
                                        </svg>
                                    </div>
                                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black to-transparent">
                                        <h3 class="font-bold"><?= $k->nama_konser ?></h3>
                                        <p class="text-sm text-gray-300">
                                            <?php if (!empty($k->tanggal)): ?>
                                            <?= date('d M Y', strtotime($k->tanggal)) ?> • <?= $k->nama_tempat ?>
                                        <?php else: ?>
                                            <span class="text-sm text-red-400">Tanggal belum tersedia</span>
                                        <?php endif; ?></p>
                                    </div>
                                </div>
                                <div class="p-4">
                                    <div class="flex justify-between items-center mb-3">
                                        <div class="flex items-center">
                                            <span class="text-sm">🔥 Trending Event</span>
                                        </div>
                                        <span class="text-sm font-medium">Tiket Terbatas! ⭐</span>
                                    </div>
                                    <a href="<?= site_url('user/booking/detail/' . $k->id_konser) ?>" class="btn-outline w-full py-2 rounded-lg text-sm text-center block">
                                        Get Tickets</a>
                                        
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                    <!-- Concert News Section -->
                        <div class="mt-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Tiket Terakhir</h2>
                                <a href="<?php echo site_url('user/tiket') ?>" class="text-primary text-sm hover:underline">Lihat Semua</a>
                            </div>

                            <?php if (!empty($tiket_terakhir)): ?>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <?php foreach ($tiket_terakhir as $t): 
                                    $status = strtolower($t->status);
                                    $badge_class = 'bg-gray-300 text-gray-800';
                                    if ($status == 'dibayar') $badge_class = 'bg-green-200 text-green-800';
                                    else if ($status == 'dipesan') $badge_class = 'bg-yellow-200 text-yellow-800';
                                    else if ($status == 'selesai') $badge_class = 'bg-blue-200 text-blue-800';
                                ?>
                                <div class="card overflow-hidden">
                                    <div class="p-4">
                                        <h3 class="font-medium mb-2"><?= htmlspecialchars($t->nama_konser) ?></h3>
                                        <p class="text-sm text-gray-400 mb-3"><?= htmlspecialchars($t->nama_kategori) ?> (<?= intval($t->jumlah) ?> Tiket)</p>

    

                                        <div class="flex justify-between items-center">
                                            <div>
                                                <?php
                                                    $status_asli = strtolower($t->status);

                                                    if ($status_asli == 'dibayar' || $status_asli == 'selesai'):
                                                ?>
                                                    <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                                        Dibayar
                                                    </span>

                                                <?php
                                                    elseif ($status_asli == 'dipesan' || $status_asli == 'menunggu konfirmasi'):
                                                ?>
                                                    <span class="inline-block px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">
                                                        Belum Dibayar
                                                    </span>
                                                
                                                <?php
                                                    else:
                                                ?>
                                                    <span class="inline-block px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs font-semibold">
                                                        <?= ucfirst($status_asli) ?>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <?php
                                                    if ($status_asli == 'dibayar' || $status_asli == 'selesai'):
                                                ?>
                                                    <a href="<?= site_url('user/tiket/detail/' . $t->id_tiket) ?>" class="text-primary text-sm hover:underline">
                                                        Lihat E-Tiket
                                                    </a>

                                                <?php
                                                    elseif ($status_asli == 'dipesan' || $status_asli == 'menunggu konfirmasi'):
                                                ?>
                                                    <a href="<?= site_url('user/pembayaran/index/' . $t->id_tiket) ?>" class="text-primary text-sm hover:underline">
                                                        Bayar / Cek Status
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php else: ?>
                                <p class="text-gray-500">Belum ada tiket yang dipesan.</p>
                            <?php endif; ?>
                        </div>
                    </div>

           