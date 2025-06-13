        <!-- Main Content -->
        <div class="flex-1 p-4 md:p-6 md:ml-0 main-content">
<!-- Top Navigation -->
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                    <?php if ($this->session->userdata('role') == 'pembeli') : ?>
                        <p class="text-gray-400">Selamat Datang Kembali, <?= $nama ?>! Siap untuk Konser Berikutnya?</p>
                    <?php endif; ?>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button id="notification-btn" class="p-2 rounded-full hover:bg-gray-800 transition-colors">
                        </button>
                    </div>
                    
                    <div class="relative">
                        <button id="profile-btn" class="flex items-center space-x-2">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Ccircle cx='20' cy='20' r='20' fill='%231DCD9F'/%3E%3Cpath d='M20 10C14.477 10 10 14.477 10 20C10 25.523 14.477 30 20 30C25.523 30 30 25.523 30 20C30 14.477 25.523 10 20 10ZM16.5 15.5C16.5 14.12 17.62 13 19 13C20.38 13 21.5 14.12 21.5 15.5C21.5 16.88 20.38 18 19 18C17.62 18 16.5 16.88 16.5 15.5ZM26.05 23.605C25.3 25.295 23.55 26.5 21.5 26.5H18.5C16.45 26.5 14.7 25.295 13.95 23.605C13.85 23.355 13.95 23.075 14.175 22.925C16.9 21.15 23.1 21.15 25.825 22.925C26.05 23.075 26.15 23.355 26.05 23.605Z' fill='white'/%3E%3C/svg%3E" alt="Profile" class="w-8 h-8 rounded-full">
                            <span class="hidden md:block"><?= $nama ?></span>
                            <i class="fas fa-chevron-down text-xs text-gray-400"></i>
                        </button>
                        
                        <!-- Profile Dropdown -->
                        <div id="profile-dropdown" class="dropdown absolute right-0 mt-2 w-48 bg-dark-gray rounded-xl shadow-lg z-10 border border-gray-700">
                            <div class="p-3 border-b border-gray-700">
                                <p class="text-sm font-medium"><?= $nama ?></p>
                                <p class="text-xs text-gray-400"><?= $email ?></p>
                            </div>
                            <div class="py-1">
                                <a href="<?php echo site_url('login/logout'); ?>" class="block px-4 py-2 text-sm text-red-400 hover:bg-gray-800">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
