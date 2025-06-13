    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Kelola Laporan Penjualan Tiket Konser</h1>
        </div>
        <div>
                            <a href="<?= base_url('admin/mnj_laporan/export_excel') ?>">
                                <button style="background-color: #FFB433;" id="add-konser-btn" class="px-4 py-2 rounded-lg text-sm flex items-center whitespace-nowrap"> <i class="fas fa-file-excel mr-2"></i> Export ke Excel
                                </button>
                            </a>
                        </div>
    </div>
 
 <!-- Main Tabs Section -->
            <div class="card mb-6">
                <div class="border-b border-gray-700 px-4 sm:px-6"> <div class="flex justify-between items-center"> 
                    <div class="flex overflow-x-auto">
                            <button class="tab active px-6 py-4 text-sm font-medium whitespace-nowrap" data-tab="tickets" style="cursor: default;"> Manajemen Laporan Penjualan
                            </button>
                            </div>

                        <div>
                            <a href="<?= base_url('admin/mnj_laporan/tambah') ?>">
                                <button id="add-konser-btn" class="btn-primary px-4 py-2 rounded-lg text-sm flex items-center whitespace-nowrap"> <i class="fas fa-plus mr-2"></i> Tambah Laporan
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-content p-5">
                    <div class="overflow-x-auto">
                        <table id="konserTable" class="text-center rmin-w-full mx-auto">
                            <thead>
                                <tr style="text-align: center;" class="text-center border-b border-gray-700">
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">No</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Konser</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Total Terjual</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Total Pendapatan</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal Laporan</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($laporan)): $no = 1; foreach ($laporan as $row): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td class="px-4 py-3 ">
                                        <div class="text-center">
                                            <span class="font-medium"><?= $no++ ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-center break-words"><?= $row->nama_konser ?></div>
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class=" text-center">
                                            <?= $row->total_terjual ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-center">
                                            <?= number_format($row->total_pendapatan, 0, ',', '.') ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class=" text-center">
                                            <?= date('d-m-Y', strtotime($row->tanggal_laporan)) ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="<?= site_url('admin/mnj_laporan/hapus/'. $row->id_laporan) ?>" onclick="return confirm('Hapus konser <?= $row->nama_konser ?>?')"><button class="p-1 text-gray-400 hover:text-danger">
                                                <i style="color: red;" class="fas fa-trash-alt"></i>
                                            </button></a>
                                        </div>
                                    </td>
                                    <?php endforeach; endif; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

