       <?php if (!$this->session->userdata('logged_in')) {
        redirect('login');
    } ?>
       <!-- Sidebar for desktop -->
        <div class="sidebar hidden md:flex md:flex-col md:w-56 p-3">
            <div class="flex items-center mb-6 px-2">
                <div class="music-wave mr-2">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <h1 class="text-xl font-bold">Ngonser</h1>
            </div>
            
            <nav class="flex-1">
            <!-- SideBar Admin -->
                <?php if ($this->session->userdata('role') == 'admin') : ?>
                <div class="space-y-1">
                    <a href="<?= site_url('admin/dashboard') ?>" class="flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'dashboard') ? 'sidebar-item active' : ''; ?>">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>

                    <p class="text-gray-400">Manajemen</p>

                 <div class="space-y-1">
                        <a href="<?= site_url('admin/mnj_user') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_user') ? 'sidebar-item active' : ''; ?>">
                            <i class="fa-solid fa-users-gear w-5 h-5 mr-3"></i>
                            <span>Kelola User</span>
                        </a>

                         <div class="space-y-1">
                    <a href="<?= site_url('admin/mnj_konser') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_konser') ? 'sidebar-item active' : ''; ?>">
                        <i class="fas fa-microphone-alt w-5 h-5 mr-3"></i>
                        <span>Kelola Konser</span>
                    </a>

                <div class="space-y-1">
                    <a href="<?= site_url('admin/mnj_lokasi') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_lokasi') ? 'sidebar-item active' : ''; ?>">
                        <i class="fas fa-map-pin w-5 h-5 mr-3"></i>
                        <span>Kelola Lokasi</span>
                    </a>

                <div class="space-y-1">
                    <a href="<?= site_url('admin/mnj_kategori') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_kategori') ? 'sidebar-item active' : ''; ?>">
                        <i class="fas fa-list w-5 h-5 mr-3"></i>
                        <span>Kelola Kategori</span>
                    </a>
                <div class="space-y-1">
                    <a href="<?= site_url('admin/mnj_jadwal') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_jadwal') ? 'sidebar-item active' : ''; ?>">
                        <i class="fas fa-calendar-alt w-5 h-5 mr-3"></i>
                        <span>Kelola Jadwal</span>
                    </a>

                    <div class="space-y-1">
                    <a href="<?= site_url('admin/mnj_pembayaran') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_pembayaran') ? 'sidebar-item active' : ''; ?>">
                        <i class="fas fa-money-bill-wave w-5 h-5 mr-3"></i>
                        <span>Kelola Pembayaran</span>
                    </a>

                 <div class="space-y-1">
                   
                    <a href="<?= site_url('admin/mnj_nota') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_nota') ? 'sidebar-item active' : ''; ?>">
                        <i class="fas fa-ticket-alt w-5 h-5 mr-3"></i>
                        <span>Kelola Tiket</span>
                    </a>

                <div class="mt-6 pt-6 border-t border-gray-700">
                    <div class="space-y-1">
                    <a href="<?= site_url('admin/mnj_laporan') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_laporan') ? 'sidebar-item active' : 'text-gray-400'; ?>">
                        <i class="fas fa-hand-holding-usd w-5 h-5 mr-3"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                    <div class="space-y-1">
                        <a href="<?= site_url('admin/mnj_report') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'mnj_report') ? 'sidebar-item active' : 'text-gray-400'; ?>">
                            <i class="fa-solid fa-circle-exclamation w-5 h-5 mr-3"></i>
                            <span>Reports</span>
                        </a>
                    <?php endif; ?>
                </div>
            </nav>
        </div>
        
        <!-- Mobile bottom navigation -->
        <div class="sidebar md:hidden fixed bottom-0 left-0 right-0 bg-dark-gray border-t border-gray-700 flex justify-around items-center py-3 px-6 z-50">
            <?php $active = (uri_string() == 'admin/dashboard') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/dashboard') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Dashboard</span>
            </a>

            <?php $active = (uri_string() == 'admin/mnj_konser') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_konser') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-microphone-alt text-lg"></i>
                <span class="text-xs mt-1">Konser</span>
            </a>

            <?php $active = (uri_string() == 'admin/mnj_jadwal') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_jadwal') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-calendar-alt text-lg"></i>
                <span class="text-xs mt-1">Jadwal</span>
            </a>

            <?php $active = (uri_string() == 'admin/mnj_lokasi') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_lokasi') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-map-pin text-lg"></i>
                <span class="text-xs mt-1">Lokasi</span>
            </a>

            <?php $active = (uri_string() == 'admin/mnj_kategori') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_kategori') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-list text-lg"></i>
                <span class="text-xs mt-1">Kategori</span>
            </a>

            <?php $active = (uri_string() == 'admin/mnj_pembayaran') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_pembayaran') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-money-bill-wave text-lg"></i>
                <span class="text-xs mt-1">Pembayaran</span>
            </a>
            <?php $active = (uri_string() == 'admin/mnj_nota') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_nota') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-ticket-alt text-lg"></i>
                <span class="text-xs mt-1">Tiket</span>
            </a>
            <?php $active = (uri_string() == 'admin/mnj_laporan') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_laporan') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fas fa-hand-holding-usd text-lg"></i>
                <span class="text-xs mt-1">Penjualan</span>
            </a>
            <?php $active = (uri_string() == 'admin/mnj_report') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_report') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fa-solid fa-circle-exclamation text-lg"></i>
                <span class="text-xs mt-1">Reports</span>
            </a>
            <?php $active = (uri_string() == 'admin/mnj_user') ? 'text-primary' : 'text-gray-400'; ?>
            <a href="<?= site_url('admin/mnj_user') ?>" class="flex flex-col items-center <?= $active ?>">
                <i class="fa-solid fa-users-gear text-lg"></i>
                <span class="text-xs mt-1">User</span>
            </a>
        </div>