<!DOCTYPE html>
<html>
<head>
    <title>PIN Ihsan 0034 2</title>
</head>
<body>
<h3> Data barang </h3>

<form>
		<label>Pencarian : </label>
		<input type="text" name="cari" value="<?php if(isset($_GET['cari'])) { echo $_GET['cari']; } ?>"  />
		<button type="submit">Cari</button>
    </form>
<table border="1">
    <tr>
        <th>No</th>
        <th>Kode Barang </th>
        <th>Nama Barang </th>
        <th>Harga Item</th>
        <th>Jumlah Barang</th>
        <th colspan="2">Aksi</th>
    </tr>

    
    <?php
     include "koneksi.php";
     $no=1;
    $ambildata = mysqli_query($koneksi,"select * from barang");

     if(isset($_GET['cari'])) {
        $cari = $_GET['cari'];
 
        $query = "SELECT * FROM barang WHERE kode_barang like '%".$cari."%' OR nama_barang like'%".$cari."%' OR jumlah_barang like '%".$cari."%' OR harga_item like '%".$cari."%' ORDER BY kode_barang ASC";
    } else {
        
        $query = "SELECT * FROM barang ORDER BY kode_barang ASC";
    }
    $result = mysqli_query($koneksi, $query);

    if(!$result) {
        die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    while ($tampil = mysqli_fetch_assoc($result)) {
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[kode_barang]</td>
            <td>$tampil[nama_barang]</td>
            <td>$tampil[harga_item]</td>
            <td>$tampil[jumlah_barang]</td>
            <td><a href='?kode=$tampil[kode_barang]'> Hapus </a></td>
            <td><a href='barang-ubah.php?kode=$tampil[kode_barang]'> Edit </a></td>
        <tr>";
        $no++;
    }


    
    while($tampil = mysqli_fetch_array($ambildata)){
        
    }
    ?>
    </table>

    <?php
    

    if(isset($_GET['kode'])){
    mysqli_query($koneksi,"delete  from barang where kode_barang='$_GET[kode]'");
    
    echo "Data berhasil dihapus";
    echo "<meta http-equiv=refresh content=2;URL='barang-data.php'>";

    }
    ?>
</body>
</html>