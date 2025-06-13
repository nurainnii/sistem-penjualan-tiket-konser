<div class="min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-lg bg-white rounded-2xl shadow-xl overflow-hidden">
        
        <div class="p-6 sm:p-8 border-b border-gray-200 text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#222222] tracking-tight">
                Konfirmasi Pembayaran
            </h2>
            <p class="mt-2 text-sm text-gray-500">
                Silakan lakukan pembayaran dan unggah bukti transfer Anda di sini.
            </p>
        </div>

        <div class="p-6 sm:p-8 bg-blue-50">
            <h3 class="font-semibold text-[#222222] mb-3">Transfer ke rekening berikut:</h3>
            <div class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Bank:</span>
                    <span class="font-mono font-semibold text-gray-800">BCA (Bank Central Asia)</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">No. Rekening:</span>
                    <span class="font-mono font-semibold text-gray-800">123-456-7890</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">Atas Nama:</span>
                    <span class="font-mono font-semibold text-gray-800">PT Konser Kita Semua</span>
                </div>
                <div class="flex justify-between mt-3 pt-3 border-t">
                    <span class="text-gray-600 font-bold">Total Pembayaran:</span>
                    <span class="font-mono font-bold text-lg text-[#1DCD9F]">Rp <?= number_format($total, 0, ',', '.') ?></span>
                </div>
            </div>
        </div>

        <div class="p-6 sm:p-8">
            <form action="<?= base_url('user/pembayaran/proses_upload') ?>" method="post" enctype="multipart/form-data" class="space-y-5">
                <input type="hidden" name="id_tiket" value="<?= $id_tiket ?>">

                <div>
                    <label for="nama_pengirim" class="block mb-2 text-sm font-medium text-gray-700">Nama Pengirim / Pemilik Rekening</label>
                    <input type="text" id="nama_pengirim" name="nama_pengirim" required placeholder="Contoh: Budi Santoso"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#1DCD9F] focus:border-[#1DCD9F] block w-full p-2.5">
                </div>
                
                <div>
                    <label for="bank" class="block mb-2 text-sm font-medium text-gray-700">Bank Asal Transfer</label>
                    <input type="text" id="bank" name="bank" required placeholder="Contoh: BCA / Mandiri / GoPay"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#1DCD9F] focus:border-[#1DCD9F] block w-full p-2.5">
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Upload Bukti Transfer</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6" id="upload-prompt">
                                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Klik untuk mengunggah</span></p>
                                <p class="text-xs text-gray-500">PNG, JPG, atau JPEG (MAX. 2MB)</p>
                            </div>
                            <div class="hidden items-center text-center" id="filename-display">
                                <p class="text-sm font-semibold text-[#1DCD9F]"></p>
                                <p class="text-xs text-gray-500 mt-1">Klik lagi untuk mengganti file</p>
                            </div>
                            <input id="dropzone-file" name="bukti_transfer" type="file" class="hidden" required accept="image/png, image/jpeg, image/jpg" />
                        </label>
                    </div> 
                </div>

                <div>
                    <button type="submit" class="w-full text-white bg-[#1DCD9F] hover:bg-[#169976] focus:ring-4 focus:outline-none focus:ring-[#169976]/50 font-medium rounded-lg text-md px-5 py-3 text-center transition-colors duration-200">
                        Kirim Bukti Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const fileInput = document.getElementById('dropzone-file');
    const uploadPrompt = document.getElementById('upload-prompt');
    const filenameDisplay = document.getElementById('filename-display');
    const filenameText = filenameDisplay.querySelector('p:first-child');

    fileInput.addEventListener('change', function() {
        if (this.files && this.files.length > 0) {
            // Tampilkan nama file
            filenameText.textContent = this.files[0].name;
            uploadPrompt.classList.add('hidden');
            filenameDisplay.classList.remove('hidden');
            filenameDisplay.classList.add('flex', 'flex-col');
        } else {
            // Kembali ke tampilan awal jika tidak ada file dipilih
            uploadPrompt.classList.remove('hidden');
            filenameDisplay.classList.add('hidden');
            filenameDisplay.classList.remove('flex', 'flex-col');
        }
    });
</script>