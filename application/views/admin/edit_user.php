<div class="flex-1 p-4 md:p-6 main-content">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Edit User Baru</h1>
            <p class="text-gray-400">Isi detail User di bawah ini.</p>
        </div>
        <a href="<?= site_url('admin/mnj_user/') ?>" class="btn-outline px-4 py-2 rounded-lg text-sm flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar User
        </a>
    </div>

    <div class="card p-5 md:p-6">
        <form action="<?= site_url('admin/mnj_user/update/'.$user->id_user) ?>" method="POST">
            <div class="mb-6">
                <label for="nama_tempat" class="form-label">Nama User</label>
                <input type="text" value="<?= $user->nama ?>" name="nama" class="form-input w-full" placeholder="Steven Frank" required>
            </div>

            <div class="mb-6">
                <label class="form-label">Email</label>
                <input name="email" value="<?= $user->email ?>" rows="4" class="form-input w-full" placeholder="Example@email.com"></input>
            </div>

            <div class="mb-6">
                <label class="form-label">Password</label>
                <input type="text" name="password" class="form-input w-full" placeholder="Kosongkan jika tidak ingin ganti.">
            </div>
            <div class="mb-6">
                <label class="form-label">Role</label>
        <select name="role" class="form-input w-full" required>
            <option value="pembeli" <?= $user->role == 'pembeli' ? 'selected' : '' ?>>Pembeli</option>
            <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>
    

            <div class="flex justify-end space-x-3 mt-8">
                <button type="reset" class="btn-outline px-6 py-2.5 rounded-lg text-sm">
                    Reset
                </button>
                <button type="submit" class="btn-primary px-6 py-2.5 rounded-lg text-sm font-medium flex items-center">
                   <i class="fa-solid fa-pen-to-square mr-2"></i>Edit User
                </button>
            </div>
        </form>
    </div>
</div>
