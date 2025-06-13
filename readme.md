# Ngonser - Sistem Informasi Penjualan Tiket Konser

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) ![CodeIgniter](https://img.shields.io/badge/CodeIgniter_3-EF4223?style=for-the-badge&logo=codeigniter&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white) ![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-06B6D4?style=for-the-badge&logo=tailwind-css&logoColor=white)

Sebuah aplikasi web full-stack untuk manajemen dan penjualan tiket konser online, dibangun sebagai Proyek Ujian Akhir Semester (UAS) mata kuliah Pemrograman Web Lanjut.

<br>

<p align="center">
  <img src="https://i.imgur.com/bWkAS92.png" alt="Tampilan Aplikasi Ngonser">
</p>

---

## 📜 Deskripsi Proyek

**Ngonser** adalah solusi digital untuk mengatasi tantangan dalam proses penjualan tiket konser konvensional. Aplikasi ini menyediakan platform terpusat bagi admin untuk mengelola setiap aspek acara dan bagi pembeli untuk memesan tiket dengan mudah, aman, dan efisien. Proyek ini mencakup alur kerja lengkap, mulai dari manajemen data master, proses booking dengan validasi stok, konfirmasi pembayaran manual, hingga penerbitan e-ticket dengan QR Code unik.

---

## ✨ Fitur Utama

Sistem ini memiliki dua hak akses utama dengan fungsionalitas yang berbeda:

#### Fitur untuk Pembeli (User)

- **Autentikasi:** Registrasi akun baru dan sistem Login yang aman.
- **Penjelajahan Konser:** Melihat daftar konser yang tersedia dengan fitur pencarian _real-time_.
- **Pemesanan Tiket:** Alur pemesanan tiket dengan validasi stok otomatis untuk mencegah _overbooking_.
- **Pembayaran Manual:** Halaman pembayaran dengan detail tagihan, nomor rekening tujuan, dan form untuk mengupload bukti transfer.
- **Batas Waktu Pembayaran:** Setiap pesanan memiliki batas waktu pembayaran (12 jam) sebelum otomatis dibatalkan dan stok dikembalikan.
- **Riwayat Pesanan:** Halaman untuk memantau status semua pesanan (`Belum Dibayar`, `Dibayar`, `Kedaluwarsa`, `Ditolak`).
- **E-Ticket dengan QR Code:** Setelah pembayaran divalidasi, pengguna mendapatkan e-tiket digital dengan QR Code unik yang siap di-scan di lokasi acara.
- **Pusat Laporan:** Fitur bagi pengguna untuk mengirim keluhan atau laporan masalah kepada admin dan melihat balasannya.

#### Fitur untuk Admin

- **Dashboard Admin:** Menampilkan ringkasan data statistik penting seperti total pendapatan, tiket terjual, dan aktivitas terbaru.
- **Manajemen Data (CRUD):** Kontrol penuh untuk menambah, mengubah, dan menghapus data `Konser`, `Jadwal`, `Lokasi`, `Kategori Tiket`, dan `User`.
- **Verifikasi Pembayaran:** Halaman khusus untuk memeriksa bukti transfer dari pembeli dan melakukan persetujuan (ACC) atau penolakan.
- **Manajemen Laporan:** Melihat dan membalas semua laporan yang masuk dari pengguna.
- **Laporan Penjualan:** Melihat rekapitulasi penjualan dan mengekspor data ke dalam format file **Excel**.

---

## 🛠️ Teknologi yang Digunakan

- **Backend:** PHP
- **Framework:** CodeIgniter 3
- **Frontend:** HTML, Tailwind CSS, JavaScript
- **Database:** MySQL (dijalankan pada MariaDB)
- **Library Tambahan:**
  - `endroid/qr-code` untuk menghasilkan QR Code.

---

## 🚀 Panduan Instalasi Lokal

Untuk menjalankan proyek ini di lingkungan lokal (misalnya menggunakan XAMPP):

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/nurainnii/sistem-penjualan-tiket-konser.git](https://github.com/nurainnii/sistem-penjualan-tiket-konser.git)
    cd sistem-penjualan-tiket-konser
    ```
2.  **Instalasi Dependency**
    - Pastikan Anda memiliki [Composer](https://getcomposer.org/). Jalankan perintah berikut di terminal:
    ```bash
    composer install
    ```
3.  **Setup Database**

    - Buat database baru di phpMyAdmin dengan nama `ngonseryu` (atau nama lain).
    - Pilih database tersebut, lalu klik tab **"Import"**.
    - Klik **"Choose File"** dan pilih file `database/ngonseryu.sql` yang ada di dalam folder proyek ini.
    - Klik tombol **"Go"** atau **"Import"** untuk memulai proses.

4.  **Konfigurasi CodeIgniter**

    - Buka file `application/config/config.php` dan sesuaikan `base_url` Anda.
      ```php
      $config['base_url'] = 'http://localhost/sistem-penjualan-tiket-konser/';
      ```
    - Buka file `application/config/database.php` dan sesuaikan dengan konfigurasi database lokal Anda (hostname, username, password, nama database).

5.  **Jalankan Aplikasi**
    - Akses `base_url` yang telah Anda atur di browser.

---

**Dibuat oleh:**
Siti Nura'inni - 2023320033
