<?php
    include_once('koneksi.php');

    $id = $_GET['id'];
    $sql = "SELECT * FROM playlist WHERE id = $id";
    $playlist = mysqli_query($con, $sql);
    $data = mysqli_fetch_object($playlist);

    $tampil = "SELECT * FROM song WHERE playlist = $id";
    $show = mysqli_query($con,$tampil);

    if($_SERVER['REQUEST_METHOD']  == 'POST'){
        include_once('koneksi.php');

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
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="icons/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Playlist Detail | musiX</title>
    </head>
    <body>
        <div class="container mt-5">
            <h2><a href="index.php"><i class="fas fa-arrow-left"></i>  </a><?= $data->playlist_name?></h2>
            <table class="mt-4">
                <tr>
                    <td>
                        <a href="#" class="mr-4"><i class="fas fa-play" aria-hidden="true" style="color:black" data-toggle="tooltip" data-placement="top" title="Play all"></i> Play all</a>
                    </td>
                    <td>
                        <a href="rename.php?id=<?= $data-> id ?>" class="mr-4" data-toggle="modal" data-target="#renamePlaylist"><i class="fas fa-pen" aria-hidden="true" style="color:black" data-toggle="tooltip" data-placement="top" title="Rename playlist"></i> Rename</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?= $data-> id ?>" class="mr-4"><i class="fas fa-times" aria-hidden="true" style="color:red" data-toggle="tooltip" data-placement="top" title="Delete playlist"></i> Delete</a>
                    </td>
                </tr>
            </table>
            <table class="table table-hover table-borderless mt-5">
                <thead>
                    <td>
                        <h4>Added songs</h4>
                    </td>
                </thead>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Artist</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($list= mysqli_fetch_object($show)) {?>
                        <tr>
                            <td><?= $list->title?></td>
                            <td><?= $list->artist?></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>

        <div class="modal fade" id="renamePlaylist" tabindex="-1" role="dialog" aria-labelledby="renamePlaylistTitle">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="renamePlaylistTitle">Rename playlist</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="rename.php" method="post">
                  <div class="modal-body">
                    <input type="text" class="form-control" value="<?= $data->id?>" id="id" name="id" style="display: none;">
                  </div>
                  <div class="modal-body">
                    <input type="text" class="form-control" value="<?= $data->playlist_name?>" id="name" name="new_name">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        

        

        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>