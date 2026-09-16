<?php
// Menerima data dari kik.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $meja = htmlspecialchars($_POST['meja']);
    $cart_raw = $_POST['cart_data'];

    if (empty($cart_raw)) {
        echo "<script>alert('Keranjang kosong!'); window.location.href='kik.php';</script>";
        exit;
    }

    $cart = json_decode($cart_raw, true);
    $total_harga = 0;
    foreach ($cart as $item) {
        $total_harga += $item['price'] * $item['qty'];
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Bu Nasir</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; line-height: 1.6; padding: 20px; }
        
        .container { max-width: 700px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); width: 100%; }
        
        h2 { text-align: center; color: #800000; margin-bottom: 20px; font-size: 1.8rem; }
        
        .order-summary { background: #fff5f0; padding: 15px; border-radius: 8px; margin-bottom: 25px; border-left: 5px solid #ff4500; }
        .order-summary p { margin-bottom: 5px; font-size: 1.05rem; }
        .total { font-size: 1.5rem; font-weight: bold; color: #cc3700; margin-top: 10px; }

        .payment-methods { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 25px; }
        
        .payment-card { 
            border: 2px solid #ddd; border-radius: 10px; padding: 15px; 
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            cursor: pointer; transition: 0.3s; font-weight: bold; color: #555; background: #fff;
        }
        .payment-card img { width: 60px; height: 60px; object-fit: contain; margin-bottom: 10px; border-radius: 8px; }
        
        .payment-card:hover { border-color: #ffb199; transform: translateY(-3px); box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .payment-card.selected { border-color: #ff4500; background: #fff0eb; color: #cc3700; box-shadow: 0 4px 12px rgba(255, 69, 0, 0.2); }
        .payment-card input { display: none; } 

        .btn-pay { width: 100%; background: linear-gradient(135deg, #ff0844, #ffb199); color: white; border: none; padding: 15px; border-radius: 8px; font-size: 1.1rem; font-weight: bold; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 10px rgba(255,8,68,0.3); }
        .btn-pay:hover { opacity: 0.9; transform: translateY(-2px); }

        #qr-section { display: none; text-align: center; margin-top: 30px; padding-top: 20px; border-top: 2px dashed #ddd; animation: fadeIn 0.5s ease; }
        #qr-section h3 { color: #333; margin-bottom: 15px; font-size: 1.2rem; }
        #qr-image { border: 10px solid #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 10px; margin-bottom: 15px; width: 220px; height: 220px; }
        .instruction { font-size: 0.95rem; color: #666; margin-bottom: 20px; }
        .btn-finish { display: inline-block; background-color: #28a745; color: white; text-decoration: none; padding: 12px 25px; border-radius: 5px; font-weight: bold; box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3); }

        /* ========================================= */
        /* RESPONSIVE DESIGN (HP & TABLET)           */
        /* ========================================= */
        
        /* Untuk Tablet */
        @media (max-width: 768px) {
            .payment-methods { grid-template-columns: repeat(2, 1fr); }
            .container { padding: 20px; }
        }
        
        /* Untuk Handphone */
        @media (max-width: 480px) {
            body { padding: 10px; }
            .container { padding: 15px; border-radius: 8px; }
            h2 { font-size: 1.5rem; }
            .order-summary p { font-size: 0.95rem; }
            .total { font-size: 1.2rem; }
            
            /* Ubah metode pembayaran jadi 1 kolom besar memanjang di HP */
            .payment-methods { grid-template-columns: 1fr; gap: 10px; }
            .payment-card { flex-direction: row; justify-content: flex-start; gap: 15px; padding: 10px 15px; }
            .payment-card img { width: 45px; height: 45px; margin-bottom: 0; }
            
            #qr-image { width: 180px; height: 180px; }
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

<div class="container">
    <h2>Pilih Metode Pembayaran</h2>
    
    <div class="order-summary">
        <p><strong>Nama:</strong> <?php echo $nama; ?></p>
        <p><strong>Meja/Catatan:</strong> <?php echo $meja; ?></p>
        <div class="total">Total Bayar: Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></div>
    </div>

    <!-- Pilihan E-Wallet & Bank dengan Gambar Asli -->
    <div class="payment-methods">
        <label class="payment-card" onclick="selectPayment(this)">
            <input type="radio" name="payment_method" value="DANA">
            <img src="images.jpg" alt="DANA">
            <span>DANA</span>
        </label>
        
        <label class="payment-card" onclick="selectPayment(this)">
            <input type="radio" name="payment_method" value="OVO">
            <img src="images (13).jpg" alt="OVO">
            <span>OVO</span>
        </label>
        
        <label class="payment-card" onclick="selectPayment(this)">
            <input type="radio" name="payment_method" value="GOPAY">
            <img src="images (1).jpg" alt="GOPAY">
            <span>GOPAY</span>
        </label>
        
        <label class="payment-card" onclick="selectPayment(this)">
            <input type="radio" name="payment_method" value="BCA">
            <img src="images (2).jpg" alt="BCA">
            <span>BCA</span>
        </label>
        
        <label class="payment-card" onclick="selectPayment(this)">
            <input type="radio" name="payment_method" value="BSI">
            <img src="images (3).jpg" alt="BSI">
            <span>BSI</span>
        </label>
        
        <label class="payment-card" onclick="selectPayment(this)">
            <input type="radio" name="payment_method" value="Bank Aceh">
            <img src="images (4).jpg" alt="Bank Aceh">
            <span>Bank Aceh</span>
        </label>
    </div>

    <button class="btn-pay" onclick="generateQR()">Tampilkan Kode QR</button>

    <!-- Bagian Kode QR -->
    <div id="qr-section">
        <h3>Scan QR Code di bawah menggunakan <span id="selected-method" style="color:#ff4500;">Aplikasi</span></h3>
        <img id="qr-image" src="" alt="QR Code Pembayaran">
        <p class="instruction">Setelah melakukan pembayaran, klik tombol di bawah untuk menyelesaikan pesanan.</p>
        <a href="kik.php" class="btn-finish" onclick="alert('Pembayaran berhasil dikonfirmasi oleh sistem. Pesanan sedang diproses dapur Bu Nasir!');">Selesaikan Pesanan</a>
    </div>
</div>

<script>
    function selectPayment(element) {
        let cards = document.querySelectorAll('.payment-card');
        cards.forEach(card => card.classList.remove('selected'));
        element.classList.add('selected');
    }

    function generateQR() {
        const method = document.querySelector('input[name="payment_method"]:checked');
        if (!method) {
            alert('Silakan pilih salah satu metode pembayaran terlebih dahulu!');
            return;
        }

        document.getElementById('selected-method').innerText = method.value;
        const total = <?php echo $total_harga; ?>;
        
        const qrData = `BuNasir_${method.value}_Rp${total}_${Date.now()}`;
        const qrUrl = `https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=${qrData}`;
        
        const qrImage = document.getElementById('qr-image');
        const qrSection = document.getElementById('qr-section');

        qrImage.src = qrUrl;
        qrSection.style.display = 'block';
        qrSection.scrollIntoView({ behavior: 'smooth' });
    }
</script>

</body>
</html>
<?php
} else {
    header("Location: kik.php");
    exit;
}
?>