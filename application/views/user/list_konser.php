<h1 class="text-3xl font-bold mb-8 text-white">Daftar Konser Tersedia</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach($konser_list as $konser): ?>
            <div class="overflow-hidden rounded-2xl shadow-xl bg-[#222222] flex flex-col transition-transform hover:scale-105 duration-300">
                <div class="relative h-44 bg-gradient-to-r from-[#1DCD9F] to-[#1DCD9F)]">
                    <img src="<?php echo base_url('./uploads/konser/' . $konser->gambar); ?>" 
                         alt="<?php echo $konser->nama_konser; ?>" 
                         class="absolute inset-0 w-full h-full object-cover opacity-20">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg" class="opacity-30">
                            <path d="M40 6.66666C21.6 6.66666 6.66667 21.6 6.66667 40C6.66667 58.4 21.6 73.3333 40 73.3333C58.4 73.3333 73.3333 58.4 73.3333 40C73.3333 21.6 58.4 6.66666 40 6.66666ZM33.3333 56.6667V23.3333L53.3333 40L33.3333 56.6667Z" fill="white"/>
                        </svg>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/70 to-transparent">
                        <h3 class="text-white font-bold text-lg truncate"><?php echo $konser->nama_konser; ?></h3>
                        <p class="text-sm text-gray-300">
                            <?php echo word_limiter(strip_tags($konser->deskripsi), 10); ?>
                        </p>
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow justify-between">
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-users text-[#169976]"></i>
                            <span class="text-gray-200">Tiket tersedia</span>
                        </div>
                    </div>
                    <a href="<?php echo site_url('user/booking/detail/' . $konser->id_konser); ?>"
                       class="mt-auto block text-center bg-[#1DCD9F] hover:bg-[#169976] text-white font-semibold text-sm py-2 rounded-xl shadow-md transition duration-200">Lihat Detail & Pesan Tiket
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
