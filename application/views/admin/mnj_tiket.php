    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Kelola Nota & Tiket</h1>
        </div>
    </div>
<!-- Main Tabs Section -->
            <div class="card mb-6">
                <div class="border-b border-gray-700 px-4 sm:px-6"> <div class="flex justify-between items-center"> <div class="flex overflow-x-auto">
                            <button class="tab active px-6 py-4 text-sm font-medium whitespace-nowrap" data-tab="tickets" style="cursor: default;"> Manajemen Nota & Tiket
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
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Kategori</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Jumlah</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach ($tiket as $t): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td style="text-align: center;" class="px-4 py-3 ">
                                            <span class="font-medium"><?= $t->nama_user ?></span>
                                    </td>
                                    <td style="text-align: center;" class="px-4 py-3 align-top"><?= $t->nama_konser ?></td>
                                    <td style="text-align: center;" class="px-4 py-3 align-top"><?= $t->nama_kategori ?></td>
                                    <td style="text-align: center;" class="px-4 py-3 align-top"><?= $t->jumlah ?></td>
                                    <td style="text-align: center;" class="px-4 py-3 align-top"><?= $t->status ?></td>
                                    <td class="px-4 py-2 text-center">
                                        <div class="flex justify-center gap-3 flex-wrap">
                                            <?php if ($t->status !== 'selesai'): ?>
                                                <a class="text-green-400" href="<?= site_url('admin/mnj_nota/aktifkan/'.$t->id_tiket) ?>">Aktifkan</a>
                                            <?php endif; ?>

                                            <?php if ($t->status == 'selesai'): ?>
                                                <a class="text-red-500" href="<?= site_url('admin/mnj_nota/nonaktifkan/'.$t->id_tiket) ?>" onclick="return confirm('NonAktifkan Nota <?= $t->nama_user ?>')">NonAktifkan</a>
                                            <?php endif; ?>

                                            <a class="text-cyan-400" href="<?= site_url('admin/mnj_nota/cetak/'.$t->id_tiket) ?>" target="_blank">
                                                <i class="fa-solid fa-file-pdf"></i>
                                            </a>

                                            <?php if (!empty($t->id_nota)): ?>
    <a href="<?= site_url('admin/mnj_nota/delete/'.$t->id_tiket) ?>" onclick="return confirm('Hapus Nota dan Tiket milik <?= $t->nama_user ?>? Ini akan menghapus Data Pembayarannya juga!')">
    <i class="fas fa-trash-alt text-red-500"></i>
</a>
<?php endif; ?>

                                        </div>
                                    </td>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

