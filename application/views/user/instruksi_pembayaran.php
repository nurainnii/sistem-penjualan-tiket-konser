<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Instruksi Pembayaran</title>
</head>
<body>
    <h2>Instruksi Pembayaran Tiket</h2>

    <p><strong>Konser:</strong> <?= htmlspecialchars($tiket->nama_konser) ?></p>
    <p><strong>Tanggal & Waktu:</strong> <?= htmlspecialchars($tiket->tanggal) ?> <?= htmlspecialchars($tiket->waktu) ?></p>
    <p><strong>Kategori:</strong> <?= htmlspecialchars($tiket->nama_kategori) ?></p>
    <p><strong>Jumlah Tiket:</strong> <?= htmlspecialchars($tiket->jumlah) ?></p>
    <p><strong>Total Bayar:</strong> Rp <?= number_format($total_bayar, 0, ',', '.') ?></p>

    <h3>Scan QR Code untuk Pembayaran</h3>
    <img src="<?= $qr_code ?>" alt="QR Code Pembayaran" />

    <p>Setelah melakukan pembayaran, silakan upload bukti pembayaran di halaman <a href="<?= base_url('pembayaran/upload_bukti/' . $tiket->id_tiket) ?>">upload bukti pembayaran</a>.</p>
</body>
</html>
