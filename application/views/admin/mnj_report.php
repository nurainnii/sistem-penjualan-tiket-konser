         <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Kelola Report Pembeli</h1>
        </div>
    </div>
 
 <!-- Main Tabs Section -->
            <div class="card mb-6">
                <div class="border-b border-gray-700 px-4 sm:px-6"> <div class="flex justify-between items-center"> 
                    <div class="flex overflow-x-auto">
                            <button class="tab active px-6 py-4 text-sm font-medium whitespace-nowrap" data-tab="tickets" style="cursor: default;"> Manajemen Laporan Penjualan
                            </button>
                            </div>
                    </div>
                </div>
                <div class="tab-content p-5">
                    <div class="overflow-x-auto">
                        <table id="konserTable" class="text-center rmin-w-full mx-auto">
                            <thead>
                                <tr style="text-align: center;" class="text-center border-b border-gray-700">
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Pelapor</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Judul</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                    <th style="text-align: center;" class="px-4 py-3 text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($laporan as $r): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td class="px-4 py-3 ">
                                        <div class=" text-center">
                                            <span class="font-medium"><?= $r->nama ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-center break-words"><?= $r->judul_report ?></div>
                                    </td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-center">
                                            <?= $r->status ?>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-center">
                                            <a href="<?= site_url('admin/mnj_report/detail/'.$r->id_report) ?>"><i style="color: #FFB433;" class="fa-solid fa-reply"></i></a>
                                            <a href="<?= site_url('admin/mnj_report/hapus/'.$r->id_report) ?>" onclick="return confirm('Hapus Report ?')"><button class="p-1 text-gray-400 hover:text-danger">
                                                    <i style="color: red;" class="fas fa-trash-alt"></i>
                                                </button></a>
                                        </div>
                                    </td>
                                    <?php endforeach;  ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

