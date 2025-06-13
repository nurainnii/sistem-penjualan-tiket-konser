<div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Kelola User</h1>
        </div>
    </div>
<!-- Main Tabs Section -->
            <div class="card mb-6">
                <div class="border-b border-gray-700 px-4 sm:px-6"> <div class="flex justify-between items-center"> <div class="flex overflow-x-auto">
                            <button class="tab active px-6 py-4 text-sm font-medium whitespace-nowrap" data-tab="tickets" style="cursor: default;"> Manajemen User
                            </button>
                            </div>

                        <div>
                            <a href="<?= site_url('admin/mnj_user/tambah/') ?>">
                                <button id="add-konser-btn" class="btn-primary px-4 py-2 rounded-lg text-sm flex items-center whitespace-nowrap"> <i class="fas fa-plus mr-2"></i> Tambah User
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
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Role</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php foreach ($users as $u): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td class="px-4 py-3 ">
                                        <div class="flex items-center">
                                            <span class="font-medium"><?= $u->nama ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 align-top"><?= $u->email ?></td>
                                    <td class="px-4 py-3 align-top">
    <?php if ($u->role == 'admin'): ?>
        <span style="background-color: #2A5D67; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
            <?= ucfirst($u->role) ?>
        </span>
    <?php elseif ($u->role == 'pembeli'): ?>
        <span style="background-color: #6930C3; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
            <?= ucfirst($u->role) ?>
        </span>
    <?php else: ?>
        <span style="background-color: #FF5722; color: white; padding: 4px 10px; border-radius: 12px; font-size: 12px;">
            <?= ucfirst($u->role) ?>Tidak Diketahui
        </span>
    <?php endif; ?>
</td>

                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex space-x-2">
                                            <a href="<?= site_url('admin/mnj_user/edit/'.$u->id_user) ?>"><button class="p-1 text-gray-400 hover:text-white">
                                                <i class="fas fa-edit"></i>
                                            </button></a>
                                            <a href="<?= site_url('admin/mnj_user/delete/'.$u->id_user) ?>" onclick="return confirm('Hapus User <?= $u->nama ?>?')"><button class="p-1 text-gray-400 hover:text-danger">
                                                <i style="color: red;" class="fas fa-trash-alt"></i>
                                            </button></a>
                                        </div>
                                    </td>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
