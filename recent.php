<?php
        include_once('koneksi.php');

        $id = $_GET['id'];
        $add = "INSERT INTO recent VALUES (DEFAULT , '$id')";
        $result = mysqli_query($con, $add);

        if($result){
          header("Location: index.php");
        }else{
          echo '<script>alert("Failed to play song")</script>';
        }
?>