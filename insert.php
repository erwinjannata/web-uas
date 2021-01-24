<?php
    if($_SERVER['REQUEST_METHOD']  == 'POST'){
        include_once('koneksi.php');

        $name = $_POST['name'];
        $insert = "INSERT INTO playlist VALUES (DEFAULT , '$name')";
        $result = mysqli_query($con, $insert);

        if($result){
          header("Location: index.php");
        }else{
          echo '<script>alert("Failed to create new playlist")</script>';
        }
    }
?>