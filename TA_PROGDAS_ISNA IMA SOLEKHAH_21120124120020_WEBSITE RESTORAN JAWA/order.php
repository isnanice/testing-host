<?php
// Modul 5 Class
class Product {
    private $nama;
    private $harga;

    // Modul 5 Constructor
    public function __construct($nama, $harga) {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    // Modul 6 getter
    public function getNama() {
        return $this->nama;
    }

    public function getHarga() {
        return $this->harga;
    }
    
    // Modul 4 Method
    public function displayProduct() {
        return $this->nama . " - Rp" . number_format($this->harga, 0, ',', '.');
    }
}

// Modul 1 Array 
$products = [
    new Product('Brekecek', 30000),
    new Product('Rawon', 50000),
    new Product('Bakmi Jawa', 30000),
    new Product('Nasi Liwet', 35000),
    new Product('Wedang Tahu', 20000),
    new Product('Es Dawet Ayu', 20000),
    new Product('Es Pacar Keling', 20000),
    new Product('Es Degan', 20000)
];

// Modul 2 pengkondisian
    if (isset($_GET['product'])) {
        $selectedProduct = $_GET['product'];
    } else {
        $selectedProduct = '';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sukma Rasa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section id="Home">
        <nav>
            <div class="logo">
                <img src="image/logo.png" alt="Logo">
            </div>
            <ul>
            <li><a href="index.php#Home">Home</a></li>
                <li><a href="index.php#About">About</a></li>
                <li><a href="index.php#Menu">Menu</a></li>
                <li><a href="index.php#Review">Review</a></li>
                <li><a href="order.php#Order">Order</a></li>
            </ul>
        </nav>

        <div class="order_form">
            <h1>Pesan Sekarang 📝</h1>
            <form method="POST" action="pay.php">
                <label for="nama">Nama 👤:</label>
                <input type="text" id="nama" name="nama" required><br>

                <label for="nomor">Nomor Hp 📱:</label>
                <input type="number" id="nomor" name="nomor" required placeholder="Masukkan nomor telepon">
                <br>
                <label for="email">Email 📧:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="address">Alamat 🏠:</label>
                <textarea id="address" name="address" required></textarea><br>

                <label for="product">Menu 🍽️:</label>
                <select name="product" id="product" required>
                    <?php
                    // Modul 3 Perulangan
                    foreach ($products as $p) {
                        $selected = ($p->getNama() == $selectedProduct) ? 'selected' : '';
                        echo "<option value=\"" . $p->getNama() . "\" $selected>" . $p->displayProduct() . "</option>";
                    }
                    ?>
                </select><br>

                <label for="jumlah">Jumlah 🔢:</label>
                <input type="number" id="jumlah" name="jumlah" value="1" min="1" required><br>

                <label for="money_paid">Uang yang Dibayar 💵:</label>
                <input type="number" id="money_paid" name="money_paid" required><br>

                <button type="submit">Pesan Sekarang</button>
            </form>
        </div>
    </section>
</body>
</html>
