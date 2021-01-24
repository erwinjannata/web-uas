<?php
    include_once('koneksi.php');

    $sql = 'DELETE FROM recent';
    $clear = mysqli_query($con, $sql);

    if($clear){
        header("Location: index.php");
    }else{
        echo '<script>alert("Failed to clear history")</script>';
    }
?>