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
                <div class="space-y-1">
                    <a href="<?php echo site_url('user/dashboard') ?>" class="flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'dashboard') ? 'sidebar-item active' : 'text-gray-400'; ?>">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="<?php echo site_url('user/booking') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'booking') ? 'sidebar-item active' : 'text-gray-400'; ?>">
                        <i class="fas fa-ticket-alt w-5 h-5 mr-3"></i>
                        <span>Ngonser</span>
                    </a>
                    
                    <div class="mt-6 pt-6 border-t border-gray-700">
                        <a href="<?php echo site_url('user/tiket') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'tiket') ? 'sidebar-item active' : 'text-gray-400'; ?>">
                        <i class="fas fa-clock-rotate-left w-5 h-5 mr-3"></i>
                        <span>Riwayat</span>
                        </a>
                        <a href="<?php echo site_url('user/report') ?>" class="sidebar-item flex items-center px-3 py-2.5 rounded-lg <?= ($this->uri->segment(2) == 'report') ? 'sidebar-item active' : 'text-gray-400'; ?>">
                            <i class="fas fa-circle-exclamation w-5 h-5 mr-3"></i>
                            <span>Report</span>
                        </a>
                    </div>
                </div>
                
            </nav>
            
        </div>
        

        <!-- Mobile bottom navigation -->
        <div class="sidebar md:hidden fixed bottom-0 left-0 right-0 bg-dark-gray border-t border-gray-700 flex justify-around items-center py-3 px-6 z-50">
            <a href="<?php echo site_url('user/dashboard') ?>" class="flex flex-col items-center  <?= ($this->uri->segment(2) == 'dashboard') ? 'text-primary' : 'text-gray-400'; ?>">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Home</span>
            </a>
            <a href="<?php echo site_url('user/booking') ?>" class="flex flex-col items-center <?= ($this->uri->segment(2) == 'booking') ? 'text-primary' : 'text-gray-400'; ?>">
                <i class="fas fa-ticket-alt text-lg"></i>
                <span class="text-xs mt-1">Tickets</span>
            </a>
            <a href="<?php echo site_url('user/tiket') ?>" class="flex flex-col items-center text-gray-400 <?= ($this->uri->segment(2) == 'tiket') ? 'text-primary' : 'text-gray-400'; ?>">
                <i class="fas fa-calendar-alt text-lg"></i>
                <span class="text-xs mt-1">Riwayat</span>
            </a>
            <a href="#" class="flex flex-col items-center text-gray-400">
                <i class="fas fa-user text-lg"></i>
                <span class="text-xs mt-1">Profile</span>
            </a>
        </div>