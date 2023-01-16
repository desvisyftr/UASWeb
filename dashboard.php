<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
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
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang</h4>

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