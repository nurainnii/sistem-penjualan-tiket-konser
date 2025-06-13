 <!-- Card total users -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="card p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Total Users</p>
                            <h3 class="text-2xl font-bold mt-1"><?= $total_users; ?></h3>
                        </div>
                        <div class="bg-primary bg-opacity-20 p-3 rounded-lg">
                            <i class="fas fa-users text-primary"></i>
                        </div>
                    </div>
                </div>
                
                <div class="card p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Konser Aktif</p>
                            <h3 class="text-2xl font-bold mt-1"><?= $total_konser ?></h3>
                        </div>
                        <div class="bg-info bg-opacity-20 p-3 rounded-lg">
                            <i class="fas fa-calendar-alt text-info"></i>
                        </div>
                    </div>
                </div>
                
                <div class="card p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Tiket Terjual</p>
                            <h3 class="text-2xl font-bold mt-1"><?= $total_tiket_terjual ?></h3>
                        </div>
                        <div class="bg-success bg-opacity-20 p-3 rounded-lg">
                            <i class="fas fa-ticket-alt text-success"></i>
                        </div>
                    </div>
                </div>
                
                <div class="card p-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-400 text-sm">Revenue</p>
                            <h3 class="text-2xl font-bold mt-1">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></h3>
                        </div>
                        <div class="bg-warning bg-opacity-20 p-3 rounded-lg">
                            <i class="fas fa-dollar-sign text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>


        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Tabel Pembayaran -->
            <div class="card mb-6">
                <div class="border-b border-gray-700">
                    <div class="flex overflow-x-auto">
                        <a href="<?php echo site_url('admin/mnj_pembayaran') ?>"><button style="color: var(--primary);" class="tab active px-6 py-4 text-sm font-medium" data-tab="tickets">
                            Pembayaran User
                        </button></a>
                    </div>
                </div>
           
                <div id="tickets-tab" class="tab-content active p-5">
                    <div>
                        <table class="w-full table-fixed">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="w-[15%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Nama Konser
                                        </div>
                                    </th>
                                    <th class="w-[20%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Pembeli</th>
                                    <th class="w-[22%] break-word px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                                    <th class="w-[15%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Jam</th>
                                    <th class="w-[23%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Harga</th>
                                    <th class="w-[15%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pembayaran as $p): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white">
                                        <div class="flex items-center">
                                            <span class="font-medium"><?= $p->nama_konser; ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= $p->nama_pembeli; ?></td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white">
                                        <div class="flex items-center">
                                            <span><?= date('d-m-Y', strtotime($p->tanggal_bayar)); ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= date('H:i', strtotime($p->tanggal_bayar)); ?></td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= number_format($p->harga, 0, ',', '.'); ?></td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white">
                                        <span class="status-badge status-active"><?= ucfirst($p->status); ?></span>
                                    </td>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        <!-- Tabel Tiket -->
            <div class="card mb-6">
                <div class="border-b border-gray-700">
                    <div class="flex overflow-x-auto">
                        <a href="<?php echo site_url('admin/mnj_nota') ?>"><button style="color: var(--primary);" class="tab active px-6 py-4 text-sm font-medium" data-tab="tickets">
                            Tiket
                        </button></a>
                    </div>
                </div>
                
                <div id="tickets-tab" class="tab-content active p-5">
                    <div>
                        <table class="w-full table-fixed">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="w-[15%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Nama Konser
                                        </div>
                                    </th>
                                    <th class="w-[20%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Pembeli</th>
                                    <th class="w-[22%] break-word px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                                    <th class="w-[15%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Jam</th>
                                    <th class="w-[12%] px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_tiket as $t): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white">
                                        <div class="flex items-center">
                                            <span class="font-medium"><?= $t->nama_konser ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= $t->nama_user ?></td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white">
                                        <div class="flex items-center">
                                            <span><?= date('d M Y', strtotime($t->tanggal)) ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= $t->waktu ?></td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= ucfirst($t->status) ?></td>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabel Report -->
            <div class="card mb-6 blur-card">
                <div class="border-b border-gray-700">
                    <div class="flex overflow-x-auto">
                        <a href="<?php echo site_url('admin/mnj_report') ?>"><button style="color: red;" class="tab active px-6 py-4 text-sm font-medium" data-tab="tickets">
                            Report User
                        </button></a>
                    </div>
                </div>
                
                <div id="tickets-tab" class="tab-content active p-5">
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-700">
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Nama Pelapor
                                        </div>
                                    </th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Judul</th>
                                    <th class="break-word px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Isi</th>
                                    <th class=" px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recent_reports as $report): ?>
                                <tr class="table-row border-b border-gray-700">
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white">
                                        <div class="flex items-center">
                                            <span class="font-medium"><?= $report->nama ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= $report->judul_report ?></td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white">
                                        <div class="flex items-center">
                                            <span><?= word_limiter($report->isi_report, 10) ?></span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 break-words whitespace-normal text-sm text-white"><?= date('d M Y', strtotime($report->tanggal_report)) ?></td>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>