<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) 
{
    $id = $_POST['id'];
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

    $sql = "UPDATE checklist SET tanggal = '$tanggal', toilet_id = '$toilet_id', kloset = '$kloset', 
    wastafel = '$wastafel', lantai = '$lantai', dinding = '$dinding', kaca = '$kaca', 
    bau = '$bau', sabun = '$sabun', users_id = '$users_id' ";
    $sql .= "WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);

    header('location: data.php');
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM checklist WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result); 

    function is_select($var, $val) {
        if ($var == $val) return 'selected="selected"';
        return false;
        
}
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
                                <input type="date" name="tanggal" class="input-control" value = "<?php echo $data['tanggal'];?>">
                            </td>
                            </tr>
                            <tr>
                            <td>Kode Toilet</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="toilet_id" value="<?php echo $data['toilet_id'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>User ID</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="users_id"  value="<?php echo $data['users_id'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Kloset</td>
                            <td>:</td>
                            <td> 
                                <select class="input-control" name="kloset">
                            <option value=""></option>
                            <option <?php echo is_select ('bersih', $data['kloset']);?> value="bersih">Bersih</option>
                            <option <?php echo is_select ('kotor', $data['kloset']);?> value="kotor">Kotor</option>
                            <option <?php echo is_select ('rusak', $data['kloset']);?> value="rusak">Rusak</option>
                                </select>

                            
                            </td>
                        </tr>
                        <tr>
                            <td>Wastafel</td>
                            <td>:</td>
                            <td>    
                            <select class="input-control" name="wastafel">
                            <option value=""></option>
                            <option <?php echo is_select ('bersih', $data['wastafel']);?> value="bersih">Bersih</option>
                            <option <?php echo is_select ('kotor', $data['wastafel']);?>  value="kotor">Kotor</option>
                            <option <?php echo is_select ('rusak', $data['wastafel']);?> value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Lantai</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="lantai">
                            <option value=""></option>
                            <option <?php echo is_select ('bersih', $data['lantai']);?> value="bersih">Bersih</option>
                            <option <?php echo is_select ('kotor', $data['lantai']);?>  value="kotor">Kotor</option>
                            <option <?php echo is_select ('rusak', $data['lantai']);?> value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Dinding</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="dinding">
                            <option value=""></option>
                            <option <?php echo is_select ('bersih', $data['dinding']);?> value="bersih">Bersih</option>
                            <option <?php echo is_select ('kotor', $data['dinding']);?> value="kotor">Kotor</option>
                            <option <?php echo is_select ('rusak', $data['dinding']);?>value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Kaca</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="kaca">
                            <option value=""></option>
                            <option <?php echo is_select ('bersih', $data['kaca']);?> value="bersih">Bersih</option>
                            <option <?php echo is_select ('kotor', $data['kaca']);?> value="kotor">Kotor</option>
                            <option <?php echo is_select ('rusak', $data['kaca']);?> value="rusak">Rusak</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Sabun</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="sabun">
                            <option value=""></option>
                            <option <?php echo is_select ('ada', $data['sabun']);?> value="ada">Ada</option>
                            <option <?php echo is_select ('habis', $data['sabun']);?> value="habis">Habis</option>
                            <option <?php echo is_select ('hilang', $data['sabun']);?> value="hilang">Hilang</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bau</td>
                            <td>:</td>
                            <td>
                            <select class="input-control" name="bau">
                            <option value=""></option>
                            <option <?php echo is_select ('ya', $data['bau']);?> value="ya">Ya</option>
                            <option <?php echo is_select ('tidak', $data['bau']);?> value="tidak">Tidak</option>
                       
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
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