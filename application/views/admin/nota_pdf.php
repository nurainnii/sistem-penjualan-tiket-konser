<!-- Template -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Konser</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5; /* Warna latar sedikit diubah untuk kontras */
            margin: 0;
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .ticket-wrapper {
            width: 100%;
            max-width: 700px; /* Lebar tiket bisa disesuaikan */
            background: #222222;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex; /* Untuk layout vertikal atau horizontal jika diinginkan */
            flex-direction: column; /* Default: header di atas, body di bawah */
            overflow: hidden; /* Menjaga border-radius */
        }

        .ticket-header {
            background: #1DCD9F;
            color: white;
            padding: 25px 30px;
            text-align: center;
        }

        .ticket-header h2 {
            margin: 0;
            font-size: 2em; /* Ukuran font disesuaikan */
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .ticket-body {
            padding: 25px 30px;
        }

        .ticket-section {
            width: 100%;
            display: block;
            margin-bottom: 20px;

        }

        /* Atur agar dua kolom berdampingan di layar lebih besar */
        @media (min-width: 600px) {
            .ticket-section.main-details {
                flex-basis: calc(60% - 15px); /* Kolom kiri sedikit lebih besar */
            }
            .ticket-section.invoice-details {
                flex-basis: calc(40% - 15px); /* Kolom kanan */
                /* padding-left: 20px;
                border-left: 1px dashed #e0e0e0; Garis pemisah visual */
            }
        }
         /* Untuk layar sangat kecil, hilangkan border */
        @media (max-width: 599px) {
            .ticket-section.invoice-details {
                padding-left: 0;
                border-left: none;
                margin-top: 20px; /* Beri jarak jika turun ke bawah */
                border-top: 1px dashed #e0e0e0; /* Garis pemisah di atas */
                padding-top: 20px;
            }
        }


        .ticket-section h3 {
            font-size: 1.3em;
            color: #169976;
            margin-top: 0;
            margin-bottom: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #f0f0f0;
        }

        .ticket-info p {
            margin: 10px 0;
            font-size: 1em; /* Ukuran font standar */
            line-height: 1.6;
            color: #333;
        }

        .ticket-info strong {
            color: #169976; /* Warna untuk label */
            font-weight: 600;
            display: inline-block;
            min-width: 100px; /* Lebar minimum label */
            margin-right: 8px;
        }

        .highlight {
            color: #1DCD9F;
            font-weight: 700;
        }

        .ticket-footer {
            padding: 20px 30px;
            background:  #1DCD9F;
            text-align: center;
            font-size: 0.9em;
            color: #555;
            border-top: 1px solid #e0e0e0;
        }
        .barcode-placeholder {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: white;
            border: 1px dashed #ccc;
            border-radius: 8px;
            padding: 15px;
            margin-top: 15px;
            min-height: 80px; /* Tinggi minimal untuk area barcode */
            text-align: center;
            color: #777;
        }
        .barcode-placeholder p {
            margin: 5px 0;
            font-size: 0.85em;
        }
        .barcode-placeholder .code {
            font-weight: bold;
            color: #1DCD9F;
            font-size: 1.1em;
            letter-spacing: 1px;
        }

    </style>
</head>
<body>

    <div class="ticket-wrapper">
        <div class="ticket-header">
            <h2>TIKET KONSER <?= strtoupper($tiket->nama_konser) ?></h2>
        </div>

        <div class="ticket-body">
            <div class="ticket-section main-details ticket-info">
                <h3 style="color: #1DCD9F;">Detail Nota & Tiket Ngonser</h3>
                <p><strong>Nama</strong> <span style="color: white;" class="value">: <?= $tiket->nama_user ?></span></p>
                <p><strong>Konser</strong> <span style="color: white;" class="value">: <?= strtoupper($tiket->nama_konser) ?></span></p>
                <p><strong>Lokasi</strong> <span style="color: white;" class="value">: <?= $tiket->nama_lokasi ?></span></p>
                <p><strong>Tanggal</strong> <span style="color: white;" class="value">: <?= $tiket->tanggal ?></span></p>
                <p><strong>Kategori</strong> <span style="color: white;" class="value">: <?= $tiket->nama_kategori ?></span></p>
                <p><strong>Jumlah</strong> <span style="color: white;" class="value">: <?= $tiket->jumlah ?></span></p>
                <p><strong>Tanggal Terbit</strong> <span style="color: white;" class="value">: <?= $nota->tanggal_terbit ?></span></p>
            </div>


                <div class="barcode-placeholder">
                    <p style="color: black;">Pindai untuk Validasi</p>
                    <img src="<?= $qr_code ?>" alt="QR Code" width="120">
                </div>

        </div>

        <div class="ticket-footer">
            <p>Terima kasih telah melakukan pembelian. Tunjukkan tiket digital ini saat memasuki area konser.</p>
            <p ><strong>PENTING:</strong> Tiket ini bersifat rahasia. Jangan bagikan kode unik Anda kepada orang lain.</p>
        </div>
    </div>

</body>
</html>