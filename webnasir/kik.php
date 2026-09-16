<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bu Nasir - Pesanan Kuliner Aceh Futuristik</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #f4f6f9; color: #333; line-height: 1.6; }
        
        /* 1. HEADER & LOGO BN */
        header { 
            background: linear-gradient(135deg, #1a1a1a, #330000); 
            color: white; 
            padding: 2.5rem 1rem; 
            text-align: center; 
            border-bottom: 4px solid #ff4500; 
        }
        .header-content { display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 15px; }
        
        .logo { 
            background: linear-gradient(135deg, #ff0844, #ffb199); 
            color: #fff; font-size: 2.5rem; font-weight: 900; 
            width: 85px; height: 85px; display: flex; align-items: center; justify-content: center; 
            border-radius: 50%; box-shadow: 0 0 20px rgba(255, 69, 0, 0.7), inset 0 0 10px rgba(0,0,0,0.3); 
            border: 2px solid #ffd700; text-shadow: 2px 2px 4px rgba(0,0,0,0.4);
        }
        
        .header-text { display: flex; flex-direction: column; align-items: center; gap: 8px; width: 100%; }
        header h1 { font-size: 2.2rem; margin-bottom: 0; color: #ffebd6; }
        header p { font-size: 1.1rem; opacity: 0.9; color: #ffb199; margin-bottom: 5px; }
        .address { font-size: 0.9rem; background: rgba(255, 69, 0, 0.2); padding: 6px 18px; border-radius: 20px; border: 1px solid rgba(255, 69, 0, 0.5); text-align: center; }
        
        /* LAYANAN PELANGGAN & SOSMED */
        .cs-section {
            background: rgba(0, 0, 0, 0.4); padding: 12px 20px; border-radius: 12px;
            border: 1px solid rgba(255, 215, 0, 0.3); display: flex; flex-direction: column;
            align-items: center; gap: 8px; margin-top: 5px; width: 100%; max-width: 500px;
        }
        .cs-title { font-size: 0.9rem; color: #ffd700; font-weight: bold; text-align: center; }
        .cs-contact { font-size: 0.85rem; color: #fff; text-align: center; }
        .social-media { display: flex; align-items: center; justify-content: center; flex-wrap: wrap; gap: 12px; margin-top: 5px; }
        .social-media img { width: 32px; height: 32px; border-radius: 8px; object-fit: cover; transition: 0.3s; cursor: pointer; }
        .social-media img:hover { transform: scale(1.15); box-shadow: 0 0 12px rgba(255, 255, 255, 0.4); }
        .social-media span { font-size: 0.85rem; font-weight: bold; color: #ffb199; }

        /* 2. LAYOUT KONTEN UTAMA */
        .container { display: flex; flex-wrap: wrap; gap: 20px; max-width: 1200px; margin: 20px auto; padding: 0 15px; }
        
        /* 3. MENU SECTION */
        .menu-section { flex: 2; min-width: 280px; }
        .menu-category { color: #800000; margin-top: 20px; margin-bottom: 10px; border-bottom: 2px solid #ddd; padding-bottom: 5px; }
        .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(220px, 1fr)); gap: 15px; }
        .menu-card { background: white; border-radius: 8px; padding: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); text-align: center; transition: 0.3s; display: flex; flex-direction: column; justify-content: space-between; }
        .menu-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .menu-card h3 { font-size: 1.1rem; margin-bottom: 8px; }
        .menu-card .price { color: #ff4500; font-weight: bold; margin-bottom: 12px; font-size: 1.1rem; }
        .btn-add { background-color: #ff4500; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; transition: 0.2s; font-weight: bold; width: 100%; }
        .btn-add:hover { background-color: #cc3700; }

        /* 4. KERANJANG & FORM PEMBAYARAN */
        .cart-section { flex: 1; min-width: 280px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.08); height: fit-content; position: sticky; top: 20px; }
        .cart-section h2 { border-bottom: 2px solid #f4f6f9; padding-bottom: 10px; margin-bottom: 15px; color: #800000; }
        
        .cart-item { background: #fff5f0; border: 1px solid #ffebe0; padding: 10px; border-radius: 5px; margin-bottom: 10px; font-size: 0.95rem; display: flex; flex-direction: column; gap: 8px; }
        .cart-item-info { display: flex; justify-content: space-between; font-weight: bold; color: #333; }
        .cart-item-actions { display: flex; justify-content: space-between; align-items: center; }
        .qty-controls { display: flex; align-items: center; gap: 10px; background: white; border: 1px solid #ff4500; border-radius: 4px; padding: 2px 5px; }
        .btn-qty { background: none; border: none; font-size: 1.2rem; font-weight: bold; cursor: pointer; color: #ff4500; padding: 0 5px; }
        
        .total-price { font-size: 1.3rem; font-weight: bold; margin-top: 15px; border-top: 2px dashed #ccc; padding-top: 10px; text-align: right; color: #28a745; }
        
        .checkout-form { margin-top: 20px; border-top: 1px solid #eee; padding-top: 15px; }
        .form-group { margin-bottom: 12px; }
        .form-group label { display: block; font-size: 0.85rem; margin-bottom: 5px; font-weight: bold; color: #555; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        .btn-submit { width: 100%; background: linear-gradient(135deg, #ff0844, #ffb199); color: white; border: none; padding: 12px; border-radius: 5px; font-weight: bold; cursor: pointer; margin-top: 10px; font-size: 1rem; transition: 0.3s; box-shadow: 0 4px 10px rgba(255,8,68,0.3); }

        /* ========================================= */
        /* 5. RESPONSIVE DESIGN (HP, TABLET, LAPTOP) */
        /* ========================================= */
        
        /* Untuk Tablet & Layar Menengah */
        @media (max-width: 992px) {
            .container { flex-direction: column; }
            .menu-section, .cart-section { width: 100%; flex: none; }
            .cart-section { position: relative; top: 0; margin-top: 20px; } /* Keranjang turun ke bawah, tidak melayang lagi */
        }
        
        /* Untuk Handphone / Layar Kecil */
        @media (max-width: 600px) {
            header { padding: 1.5rem 0.5rem; }
            .logo { width: 70px; height: 70px; font-size: 2rem; }
            header h1 { font-size: 1.8rem; }
            header p { font-size: 0.95rem; }
            .cs-contact { display: flex; flex-direction: column; gap: 5px; } /* Nomor telepon baris ke bawah */
            
            .menu-grid { grid-template-columns: repeat(2, 1fr); gap: 10px; } /* Jadikan 2 kolom rapat di HP */
            .menu-card { padding: 10px; }
            .menu-card h3 { font-size: 1rem; }
            
            .cart-section { padding: 15px; }
        }

        /* Untuk Handphone Sangat Kecil (Lebar Layar < 400px) */
        @media (max-width: 400px) {
            .menu-grid { grid-template-columns: 1fr; } /* Jadikan 1 kolom memanjang */
            .social-media span { display: none; } /* Sembunyikan teks @BuNasir agar ikon tidak sempit */
        }
    </style>
</head>
<body>

    <header>
        <div class="header-content">
            <div class="logo">BN</div>
            <div class="header-text">
                <h1>Bu Nasir</h1>
                <p>Menyajikan Kuliner Cita Rasa Khas Aceh yang Mudah, Simpel, dan Efisien</p>
                <div class="address">📍 Jl. Teuku Nyak Arief No. 12, Banda Aceh | 🕒 Buka: 09.00 - 23.00 WIB</div>
                
                <div class="cs-section">
                    <div class="cs-title">Punya Kritik & Saran? Hubungi Kami:</div>
                    <div class="cs-contact">
                        <span>📞 Telepon: 0651-123456</span> 
                        <span>📱 CS WhatsApp: 0812-3456-7890</span>
                    </div>
                    <div class="social-media">
                        <img src="images (7).jpg" alt="YouTube Bu Nasir" title="YouTube">
                        <img src="images (5).jpg" alt="TikTok Bu Nasir" title="TikTok">
                        <img src="images (6).jpg" alt="Instagram Bu Nasir" title="Instagram">
                        <span>@BuNasir_KulinerAceh</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <!-- DAFTAR MENU -->
        <div class="menu-section">
            <h2 class="menu-category">Makanan Khas Aceh</h2>
            <div class="menu-grid">
                <div class="menu-card">
                    <h3>Mie Aceh Daging</h3>
                    <div class="price">Rp 35.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Mie Aceh Daging', 35000)">+ Keranjang</button>
                </div>
                <div class="menu-card">
                    <h3>Mie Aceh Kepiting</h3>
                    <div class="price">Rp 50.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Mie Aceh Kepiting', 50000)">+ Keranjang</button>
                </div>
                <div class="menu-card">
                    <h3>Ayam Tangkap</h3>
                    <div class="price">Rp 45.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Ayam Tangkap', 45000)">+ Keranjang</button>
                </div>
                <div class="menu-card">
                    <h3>Kuah Beulangong</h3>
                    <div class="price">Rp 40.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Kuah Beulangong', 40000)">+ Keranjang</button>
                </div>
            </div>

            <h2 class="menu-category">Minuman Penutup</h2>
            <div class="menu-grid">
                <div class="menu-card">
                    <h3>Kopi Sanger Espresso</h3>
                    <div class="price">Rp 18.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Kopi Sanger Espresso', 18000)">+ Keranjang</button>
                </div>
                <div class="menu-card">
                    <h3>Es Teh Tarik</h3>
                    <div class="price">Rp 15.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Es Teh Tarik', 15000)">+ Keranjang</button>
                </div>
                <div class="menu-card">
                    <h3>Es Timun Serut</h3>
                    <div class="price">Rp 12.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Es Timun Serut', 12000)">+ Keranjang</button>
                </div>
                <div class="menu-card">
                    <h3>Kopi Arabica Gayo</h3>
                    <div class="price">Rp 20.000</div>
                    <button type="button" class="btn-add" onclick="addToCart('Kopi Arabica Gayo', 20000)">+ Keranjang</button>
                </div>
            </div>
        </div>

        <!-- KERANJANG PESANAN -->
        <div class="cart-section">
            <h2>Keranjang Saya</h2>
            <div id="cart-list">
                <p style="color: #888; text-align: center;">Keranjang masih kosong.</p>
            </div>
            
            <div class="total-price">
                Total: <span id="total-amount">Rp 0</span>
            </div>

            <form class="checkout-form" action="pembayaran.php" method="POST">
                <input type="hidden" name="cart_data" id="cart-data-input">
                
                <div class="form-group">
                    <label for="nama">Nama Pemesan</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama Anda">
                </div>
                
                <div class="form-group">
                    <label for="meja">Nomor Meja / Catatan</label>
                    <input type="text" id="meja" name="meja" required placeholder="Contoh: Meja 05 / Pedas">
                </div>

                <button type="submit" class="btn-submit">Lanjut ke Pembayaran</button>
            </form>
        </div>
    </div>

    <!-- SCRIPT JAVASCRIPT KERANJANG -->
    <script>
        let cart = [];

        function addToCart(name, price) {
            const existingItem = cart.find(item => item.name === name);
            if (existingItem) {
                existingItem.qty += 1;
            } else {
                cart.push({ name: name, price: price, qty: 1 });
            }
            updateCartUI();
        }

        function decreaseQty(name) {
            const item = cart.find(item => item.name === name);
            if (item) {
                item.qty -= 1;
                if (item.qty === 0) {
                    cart = cart.filter(i => i.name !== name);
                }
                updateCartUI();
            }
        }

        function updateCartUI() {
            const cartList = document.getElementById('cart-list');
            const totalAmount = document.getElementById('total-amount');
            const cartDataInput = document.getElementById('cart-data-input');

            if (cart.length === 0) {
                cartList.innerHTML = '<p style="color: #888; text-align: center;">Keranjang masih kosong.</p>';
                totalAmount.innerText = 'Rp 0';
                cartDataInput.value = '';
                return;
            }

            cartList.innerHTML = '';
            let total = 0;

            cart.forEach(item => {
                const itemTotal = item.price * item.qty;
                total += itemTotal;

                cartList.innerHTML += `
                    <div class="cart-item">
                        <div class="cart-item-info">
                            <span>${item.name}</span>
                            <span>Rp ${itemTotal.toLocaleString('id-ID')}</span>
                        </div>
                        <div class="cart-item-actions">
                            <span style="font-size: 0.85rem; color: #ff4500;">Harga: Rp ${item.price.toLocaleString('id-ID')}</span>
                            <div class="qty-controls">
                                <button type="button" class="btn-qty" onclick="decreaseQty('${item.name}')">-</button>
                                <span>${item.qty}</span>
                                <button type="button" class="btn-qty" onclick="addToCart('${item.name}', ${item.price})">+</button>
                            </div>
                        </div>
                    </div>
                `;
            });

            totalAmount.innerText = 'Rp ' + total.toLocaleString('id-ID');
            cartDataInput.value = JSON.stringify(cart);
        }
    </script>
</body>
</html>