<?php
session_start();
include 'koneksi.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM checklist WHERE id = '".$_SESSION['id']."'");
$d = mysqli_fetch_object($query);
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
            <h3>Daftar Toilet</h3>
            <div class="box">
                <form action="" method="post">
                    <table border="0" class="table-form">
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>
                                <input type="date" name="tanggal" class="input-control" >
                            </td>
                            </tr>
                            <tr>
                            <td>Kode Toilet</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="toilet_id" >
                            </td>
                        </tr>
                        <tr>
                            <td>User ID</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="users_id" >
                            </td>
                        </tr>
                        <tr>
                            <td>Kloset</td>
                            <td>:</td>
                            <td> 
                                <select class="input-control" name="kloset">
                            <option value=""></option>
                            <option value="bersih">Bersih</option>
                            <option value="kotor">Kotor</option>
                            <option value="rusak">Rusak</option>
                                </select>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>Wastafel</td>
                            <td>:</td>
                            <td>    
                            <select class="input-control" name="wastafel">
                            <option value=""></option>
                            <option value="bersih">Bersih</option>
                            <option value="kotor">Kotor</option>
                            <option value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Lantai</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="lantai">
                            <option value=""></option>
                            <option value="bersih">Bersih</option>
                            <option value="kotor">Kotor</option>
                            <option value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Dinding</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="dinding">
                            <option value=""></option>
                            <option value="bersih">Bersih</option>
                            <option value="kotor">Kotor</option>
                            <option value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kaca</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="kaca">
                            <option value=""></option>
                            <option value="bersih">Bersih</option>
                            <option value="kotor">Kotor</option>
                            <option value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Sabun</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="sabun">
                            <option value=""></option>
                            <option value="ada">Ada</option>
                            <option value="habis">Habis</option>
                            <option value="hilang">Hilang</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bau</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="bau">
                            <option value=""></option>
                            <option value="ya">Ya</option>
                            <option value="tidak">Tidak</option>
                       
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" class="btn-daftar" value="Submit">
                            </td>
                        </tr>
                       
                    </table>
                </form>
                <?php
                if (isset($_POST['submit'])){
                    $tanggal = $_POST['tanggal'];
                    $toilet_id = $_POST['toilet_id'];
                    $kloset = $_POST['kloset'];
                    $wastafel = $_POST['wastafel'];
                    $lantai = $_POST['lantai'];
                    $dinding = $_POST['dinding'];
                    $kaca = $_POST['kaca'];
                    $bau = $_POST['bau'];
                    $sabun = $_POST['sabun'];
                    $users_id = $_POST['users_id'];
                    $sql = 'INSERT INTO checklist (tanggal, toilet_id, kloset, wastafel, lantai, dinding, kaca, bau, sabun, users_id) ';
                    $sql .= "VALUE ('{$tanggal}', '{$toilet_id}', '{$kloset}', '{$wastafel}', '{$lantai}', '{$dinding}', '{$kaca}', '{$bau}', '{$sabun}', '{$users_id}')";
                    $result = mysqli_query($conn, $sql);
                if($sql){
                    echo '<script>alert("TAMBAH DATA BERHASIL")</script>';
                    echo '<script>window.location="data.php"</script>';
                }else{
                    echo 'gagal' .mysqli_error($conn);
                }

                }

                ?>
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