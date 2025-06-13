<!DOCTYPE html>
<html>
<head>
    <title>Form Pembayaran</title>
</head>
<body>
    <h1>Konfirmasi Pembayaran</h1>
    <p>ID Pesanan: <strong><?php echo $pesanan->id_pemesanan; ?></strong></p>
    <p>Total Tagihan: <strong>Rp <?php echo number_format($pesanan->total_harga); ?></strong></p>
    <hr>
    <?php if(isset($error)) echo "<p style='color:red;'>{$error}</p>"; ?>
    
    <form action="<?php echo site_url('pembayaran/proses'); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pesanan" value="<?php echo $pesanan->id_pemesanan; ?>">
        
        <label for="nama_pengirim">Nama Pengirim:</label><br>
        <input type="text" name="nama_pengirim" required><br><br>

        <label for="bank">Bank:</label><br>
        <input type="text" name="bank" required><br><br>

        <label for="bukti_transfer">Upload Bukti Transfer:</label><br>
        <input type="file" name="bukti_transfer" required><br><br>
        
        <button type="submit">Konfirmasi Pembayaran</button>
    </form>
</body>
</html>