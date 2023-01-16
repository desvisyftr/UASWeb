<?php
session_start();
include 'koneksi.php';
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE tanggal LIKE '%".$q."%' or toilet_id LIKE '%".$q."%' or kloset LIKE '%".$q."%' 
    or wastafel LIKE '%".$q."%' or lantai LIKE '%".$q."%' or dinding LIKE '%".$q."%' 
    or sabun LIKE '%".$q."%' or bau LIKE '%".$q."%' or users_id LIKE '%".$q."%'" ;
    
}
$sql = 'SELECT * FROM checklist ';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebersihan Toilet</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Kebersihan Toilet</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="daftar.php">Daftar Toilet</a></li>
                <li><a href="data.php">Data Toilet</a></li>
            </ul>
        </div>
    </header>
    <div class="section">
        <div class="container">
            <h3>Data Toilet</h3>
            <div class="box">
                <p><a href="daftar.php">Tambah Data</a></p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Toilet</th>
                            <th>User ID</th>
                            <th>Kloset</th>
                            <th>Wastafel</th>
                            <th>Lantai</th>
                            <th>Dinding</th>
                            <th>Sabun</th>
                            <th>Bau</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $data = mysqli_query($conn, "SELECT * FROM checklist ORDER BY id DESC");
                        while($row = mysqli_fetch_array($data)){

                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['tanggal']?></td>
                            <td><?php echo $row['toilet_id']?></td>
                            <td><?php echo $row['users_id']?></td>
                            <td><?php echo $row['kloset']?></td>
                            <td><?php echo $row['wastafel']?></td>
                            <td><?php echo $row['lantai']?></td>
                            <td><?php echo $row['dinding']?></td>
                            <td><?php echo $row['sabun']?></td>
                            <td><?php echo $row['bau']?></td>
                            <td><a href="edit.php?id=<?php echo $row['id']?>">Edit</a>  || <a href="hapus.php?idk=<?php echo $row['id']?>" 
                            onclick="return confirm('Apakah Anda Yakin Ingin Data Ini di Hapus?')">Hapus</a>
                        </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
           <small>Copyright &copy; 2023 - KebersihanToilet.</small> 
        </div>
    </footer>
</body>

</html>