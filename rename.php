<?php
    include_once('koneksi.php');

    if($_SERVER['REQUEST_METHOD']  == 'POST'){

        $id = $_POST['id'];
        $name = $_POST['new_name'];
        $sql = "UPDATE playlist SET playlist_name = '$name' WHERE id = $id";
        $result = mysqli_query($con, $sql);

        if($result){
            header("Location: index.php");
        }else{
            echo '<script>alert("Failed to rename playlist")</script>';
        }
    }
?>