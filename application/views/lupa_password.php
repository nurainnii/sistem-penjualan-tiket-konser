<div class="flex-1 p-5 md:p-8 main-content bg-[#222222] dark:bg-gray-900 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#1DCD9F] dark:text-white">Lupa Password?</h1>
            <p class="text-gray-500 text-white mt-2">Jangan khawatir! Masukkan email Anda dan kami akan bantu prosesnya.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
            
            <?php if ($this->session->flashdata('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                    <p><?= $this->session->flashdata('error'); ?></p>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('login/cek_email') ?>" method="post">
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Email</label>
                    
                    <input type="email" id="email" name="email" 
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" 
                           placeholder="nama@email.com" required>
                </div>
                
                <div class="mt-8">
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600">
                        Kirim Link Reset
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center mt-6">
            <a href="<?= site_url('Welcome') ?>" class="text-sm text-[#1DCD9F] hover:underline dark:text-blue-400 flex items-center justify-center">
                <i class="fas fa-arrow-left mr-2"></i>
                <span>Kembali ke halaman Login</span>
            </a>
        </div>
    </div>

</div>