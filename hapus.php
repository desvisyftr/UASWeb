<?php
include_once 'koneksi.php';
if(isset($_GET['idk'])){
    $delete = mysqli_query($conn, "DELETE FROM checklist WHERE id = '".$_GET['idk']."' ");
    echo '<script>window.location="data.php"</script>';
}

?>