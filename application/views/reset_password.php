<div class="flex-1 bg-[#222222] dark:bg-gray-900 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-[#1DCD9F] dark:text-white">Reset Password</h1>
            <p class="text-white dark:text-gray-400 mt-2">Buat password baru Anda. Pastikan password kuat dan mudah diingat.</p>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 md:p-8">
            
            <?php if ($this->session->flashdata('error')): ?>
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md" role="alert">
                    <p><?= $this->session->flashdata('error'); ?></p>
                </div>
            <?php endif; ?>

            <form id="reset-password-form" action="<?= site_url('login/simpan_password_baru') ?>" method="post">
                <div class="mb-4">
                    <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                    <div class="relative">
                        <input type="password" id="new_password" name="password" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                               placeholder="••••••••" required minlength="8">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword('new_password', this)">
                            <i class="fas fa-eye text-gray-400"></i>
                        </span>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
                    <div class="relative">
                         <input type="password" id="confirm_password" name="confirm_password"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10 dark:bg-gray-700 dark:border-gray-600 dark:text-white" 
                               placeholder="••••••••" required minlength="8">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer" onclick="togglePassword('confirm_password', this)">
                            <i class="fas fa-eye text-gray-400"></i>
                        </span>
                    </div>
                    <p id="password-error" class="text-red-500 text-xs mt-1 hidden">Password tidak cocok.</p>
                </div>
                
                <div class="mt-8">
                    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600">
                        Simpan Password Baru
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

<script>
    function togglePassword(inputId, iconElement) {
        const passwordInput = document.getElementById(inputId);
        const icon = iconElement.querySelector('i');
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = "password";
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    const form = document.getElementById('reset-password-form');
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');
    const passwordError = document.getElementById('password-error');

    form.addEventListener('submit', function(event) {
        if (newPassword.value !== confirmPassword.value) {
            passwordError.classList.remove('hidden');
            confirmPassword.classList.add('border-red-500', 'animate__animated', 'animate__shakeX');
            
            event.preventDefault(); 
        } else {
            passwordError.classList.add('hidden');
            confirmPassword.classList.remove('border-red-500', 'animate__animated', 'animate__shakeX');
        }
    });
</script>