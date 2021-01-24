<?php
        include_once('koneksi.php');

        $id = $_GET['id'];
        $sql = "DELETE FROM playlist WHERE id = $id";
        $delete = mysqli_query($con, $sql);

        if($delete){
            header("Location: index.php");
        }else{
            echo '<script>alert("Failed to delete existing playlist")</script>';
        }
?>