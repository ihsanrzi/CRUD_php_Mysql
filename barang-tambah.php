<!DOCTYPE html>
<html>
<head>
    <title>PIN Ihsan 0034</title>
</head>
<body>
<h3> Tambah Barang </h3>

<form action="" method="post">
<table>
    <tr>
        <td width="120"> Kode Barang </td>
        <td> <input type="text" name="kode_barang"> </td>
    </tr>
    <tr>
        <td> Nama Barang </td>
        <td> <input type="text" name="nama_barang"> </td>
    </tr>
    <tr>
        <td> Harga Item </td>
        <td> <input type="text" name="harga_item"> </td>
    </tr>
    <tr>
        <td> Jumlah Barang </td>
        <td> <input type="text" name="jumlah_barang"> </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="proses" value="Simpan"> </td>
    </tr>
</table>

</form>

<?php
include "koneksi.php";

if(isset($_POST['proses'])){
mysqli_query($koneksi, "insert into barang set  
kode_barang = '$_POST[kode_barang]',
nama_barang = '$_POST[nama_barang]',
harga_item = '$_POST[harga_item]',
jumlah_barang = '$_POST[jumlah_barang]'");

echo "Data barang baru telah tersimpan";

}

?>
</body>
</html>