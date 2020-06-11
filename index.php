<?php
  include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
    <style>
      table{
        width: 840px;
        margin: auto;
      }
      h1{
        text-align: center;
      }
    </style>
  </head>
  <body>
    <h1>Tabel Biodata Siswa Sederhana </h1>
    <center><a href="input.php" style="text-decoration:none">Input Data </a></center>
  <p align="center">
	<input type="text" placeholder="Masukan kata kunci" name="kata_kunci"/>
  <input type="submit" name="submit" value="Cari">
	</p>
  <center><a href="shorting.php" style="text-decoration:none">Shorting Data</a></center>
  <?php 

$orderBy = !empty($_GET["orderby"]) ? $_GET["orderby"] : "nama";
$order = !empty($_GET["order"]) ? $_GET["order"] : "asc";
$sql = "SELECT*FROM mahasiswa ORDER BY". $orderBy ."".$order;
$result = $link->query($sql);

$orderNama = "asc";
$orderIpk = "asc";

if($orderBy == "nama" && $order == "asc"){
    $orderNama = "desc";
}
if($orderBy == "ipk" && $order == "asc"){
    $orderIpk = "desc";
}
?>
    <table border="1">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Fakultas</th>
        <th>Jurusan</th>
        <th>IPK</th>
        <th>Pilihan</th>
      </tr>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM mahasiswa ORDER BY nim ASC";
      $result = mysqli_query($link, $query);
      if(!$result){
        die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($data = mysqli_fetch_assoc($result))
      {
        // mencetak / menampilkan data
        echo "<tr>";
        echo "<td>$no</td>"; 
        echo "<td>$data[nim]</td>"; 
        echo "<td>$data[nama]</td>";
        echo "<td>$data[fakultas]</td>";
        echo "<td>$data[jurusan]</td>"; 
        echo "<td>$data[ipk]</td>"; 
        echo '<td>
          <a href="edit.php?id='.$data['id'].'">Edit</a> /
          <a href="hapus.php?id='.$data['id'].'"
      		  onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
        </td>';
        echo "</tr>";
        $no++; // menambah nilai nomor urut
      }
      ?>
    </table>
  </body>
</html>
<?php 
if (isset($_POST['submit'])){

}
?>
