    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Kelola Pembayaran Masuk</h1>
        </div>
    </div>
<!-- Main Tabs Section -->
            <div class="card mb-6">
                <div class="border-b border-gray-700 px-4 sm:px-6"> <div class="flex justify-between items-center"> <div class="flex overflow-x-auto">
                            <button class="tab active px-6 py-4 text-sm font-medium whitespace-nowrap" data-tab="tickets" style="cursor: default;"> Manajemen Pembayaran
                            </button>
                            </div>

                        
                    </div>
                </div>
                <div class="tab-content p-5">
                    <div class="overflow-x-auto">
                        <table id="konserTable" class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Pembeli</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Konser</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Bukti Transfer</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach ($pembayaran as $p): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td style="text-align: center;" class="px-4 py-3">
                                            <span class="font-medium"><?= $p->nama_pembeli ?></span>
                                    </td>
                                    <td style="text-align: center;" class="px-4 py-3 align-top"><?= $p->nama_konser ?></td>
                                    <td style="text-align: center;" class="px-4 py-3 align-top"><?= $p->tanggal_bayar ?></td>
                                    <td style="text-align: center;" class="px-4 py-2">
                                        <span class="<?= $p->status == 'ditolak' ? 'text-red-500' : ($p->status == 'valid' ? 'text-green-600' : 'text-yellow-600') ?>">
                                            <?= ucfirst($p->status) ?>
                                        </span>
                                    </td>
                                    <td style="text-align: center;" class="px-4 py-2">
                        <?php if ($p->bukti_transfer): ?>
                            <a href="<?= base_url('uploads/bukti/' . $p->bukti_transfer) ?>" target="_blank" class="text-blue-500 underline">Lihat</a>
                        <?php else: ?>
                            <span class="text-gray-500 italic">Belum ada</span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align: center;" class="px-4 py-2 flex gap-2">
                        <a href="<?= site_url('admin/mnj_pembayaran/ubah_status/' . $p->id_pembayaran . '/valid') ?>" class="text-green-600 hover:underline">ACC</i></a>
                        <a href="<?= site_url('admin/mnj_pembayaran/ubah_status/' . $p->id_pembayaran . '/ditolak') ?>" class="text-red-600 hover:underline">TOLAK</i></a>
                         <a href="<?= site_url('admin/mnj_pembayaran/hapus/'.$p->id_pembayaran) ?>" onclick="return confirm('Hapus Pembayaran <?= $p->nama_pembeli ?>?')"><button class="p-1 text-gray-400 hover:text-danger">
                                                <i style="color: red;" class="fas fa-trash-alt"></i>
                                            </button></a>
                    </td>
                </tr>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
