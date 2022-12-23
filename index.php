<?php
include("koneksi.php");

// query untuk menampilkan data
$q="";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = " WHERE nama LIKE '{$q}%'";
}
$tittle = 'Data Barang';
include_once 'koneksi.php';
$sql = 'SELECT * FROM data_barang';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);echo $sql;
include_once 'header.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<?php
echo '<a href="tambah.php" class="btn btn-large">Tambah Barang</a>';
?>
<form action ="" method ="get">
    <label for="q">Cari Data: </label>
    <input type ="text" id="q" name="q" class="input-q" value="<?php echo $q ?>">
    <input type="submit" name="submit" value="cari" clas="btn btn-primary">
</form>
<?php
if ($result):
    ?>
    <table>
<body>
    <div class="container">
        <h1>Data Barang</h1>
        <div class="main">
            <table class="table table-bordered border-primary">
            <thead class="table-primary">
                <tr>
                    <th>Gambar</th>
                    <th>Nama Barang</th>
                    <th>Katagori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
</thead>
                <?php if($result): ?>
                    <?php while($row = mysqli_fetch_array($result)): ?>
                        <tr>
                            <td><img src="gambar/<?= $row['gambar'];?>" alt="<?=$row['nama'];?>"></td>
                <td><?= $row['nama'];?></td>
                <td><?= $row['kategori'];?></td>
                <td><?= $row['harga_beli'];?></td>
                <td><?= $row['harga_jual'];?></td>
                <td><?= $row['stok'];?></td>
                <td>
                <a href="ubah.php?id=<? $row['Id_barang']; ?>">ubah</a>
                <a href="ubah.php?id=<? $row['Id_barang']; ?>>" onclick="
                    return confirm('Apakah anda yakin ingin menghapusnya?');">hapus</a>
                </td>
            </tr>
            <?php endwhile; else: ?>
                <tr>
                    <td colspan="7">Belum ada data</td>
                </tr>
                <?php endif; ?>
                <?php endif; ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>