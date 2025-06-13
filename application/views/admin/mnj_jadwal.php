    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Kelola Jadwal Konser</h1>
        </div>
    </div>
<!-- Main Tabs Section -->
            <div class="card mb-6">
                <div class="border-b border-gray-700 px-4 sm:px-6"> <div class="flex justify-between items-center"> <div class="flex overflow-x-auto">
                            <button class="tab active px-6 py-4 text-sm font-medium whitespace-nowrap" data-tab="tickets" style="cursor: default;"> Manajemen Jadwal 
                            </button>
                            </div>

                        <div>
                            <a href="<?= site_url('admin/mnj_jadwal/tambah/') ?>">
                                <button id="add-konser-btn" class="btn-primary px-4 py-2 rounded-lg text-sm flex items-center whitespace-nowrap"> <i class="fas fa-plus mr-2"></i> Tambah Jadwal
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="tab-content p-5">
                    <div class="overflow-x-auto">
                        <table id="konserTable" class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Konser</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tempat</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Waktu</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach ($jadwal as $j): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td class="px-4 py-3 ">
                                        <div class="flex items-center">
                                            <span class="font-medium"><?= $j->nama_konser ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 align-top"><?= $j->nama_tempat ?></td>
                                    <td class="px-4 py-3 align-top"><?= $j->tanggal ?></td>
                                    <td class="px-4 py-3 align-top"><?= $j->waktu ?></td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="<?= site_url('admin/mnj_jadwal/edit/'.$j->id_jadwal) ?>"><button class="p-1 text-gray-400 hover:text-white">
                                                <i class="fas fa-edit"></i></a>
                                            </button>
                                            <a href="<?= site_url('admin/mnj_jadwal/hapus/'.$j->id_jadwal) ?>" onclick="return confirm('Hapus Jadwal ini?')"><button class="p-1 text-gray-400 hover:text-danger">
                                                <i style="color: red;" class="fas fa-trash-alt"></i>
                                            </button></a>
                                        </div>
                                    </td>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
