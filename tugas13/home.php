<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Daftar Produk Makanan</title>
</head>
<body>

<?php
$foodProducts = [
    ['id' => 1, 'nama_barang' => 'Nasi Goreng', 'harga' => 'Rp 25,000', 'deskripsi' => 'Nasi goreng spesial dengan campuran rempah-rempah pilihan.', 'gambar' => 'image/nasi-goreng.jpg'],
    ['id' => 2, 'nama_barang' => 'Mie Ayam', 'harga' => 'Rp 20,000', 'deskripsi' => 'Mie ayam dengan irisan daging ayam dan kuah kaldu lezat.', 'gambar' => 'image/mie-ayam.jpg'],
    ['id' => 3, 'nama_barang' => 'Bakso Malang', 'harga' => 'Rp 30,000', 'deskripsi' => 'Bakso dengan cita rasa khas Malang, disajikan dengan mie dan kuah kaldu spesial.', 'gambar' => 'image/bakso-malang.jpg'],
];
?>

<?php foreach ($foodProducts as $product): ?>
    <div class="card">
        <img src="<?= $product['gambar']; ?>" alt="<?= $product['nama_barang']; ?>">
        <h3><?= $product['nama_barang']; ?></h3>
        <p><strong>Harga:</strong> <?= $product['harga']; ?></p>
        <p><?= $product['deskripsi']; ?></p>
        <button onclick="pesanMakanan(<?= $product['id']; ?>)">Pesan</button>
    </div>
<?php endforeach; ?>

<script>
    function pesanMakanan(id) {
        var selectedProduct = findProductById(id);
        alert('Anda telah memesan ' + selectedProduct.nama_barang + ' dengan harga ' + selectedProduct.harga);
    }

    function findProductById(id) {
        return <?php echo json_encode($foodProducts); ?>.find(product => product.id === id);
    }
</script>

</body>
</html>
