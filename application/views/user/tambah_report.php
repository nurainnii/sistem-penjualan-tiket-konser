<div class="container mx-auto p-4 md:p-8">
    <div class="flex items-center mb-6">
        <a href="<?= site_url('user/report') ?>" class="text-[#1DCD9F] hover:text-[#169976] dark:text-blue-400">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <h1 class="text-2xl md:text-3xl font-bold text-[#1DCD9F] dark:text-gray-100 ml-4">Buat Laporan Baru</h1>
    </div>

    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md border border-gray-200 dark:border-gray-700 p-6">
        <form action="<?= site_url('user/report/simpan') ?>" method="post">
            <div class="mb-4">
                <label for="judul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Laporan</label>
                <input type="text" id="judul" name="judul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: Masalah pada halaman pembayaran" required>
            </div>

            <div class="mb-6">
                <label for="isi_laporan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jelaskan Masalah Anda</label>
                <textarea id="isi_laporan" name="isi_laporan" rows="8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Tuliskan detail masalah atau keluhan Anda di sini..." required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="text-white bg-[#169976] hover:bg-[#1DCD9F] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                    Kirim Laporan
                </button>
            </div>
        </form>
    </div>
</div>