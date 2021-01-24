<?php
    // ---WORK IN PROGRESS---
    // erwin jannata
    include_once('koneksi.php');
    $sql = 'SELECT * FROM song';
    $song = mysqli_query($con, $sql);


    $list = 'SELECT * FROM playlist';
    $playlist = mysqli_query($con, $list);

    $play = 'SELECT title FROM song INNER JOIN recent ON recent.id_song = song.id ORDER BY song_order DESC';
    $history = mysqli_query($con, $play);
?>

<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="icons/css/all.css">
        <link rel="stylesheet" href="css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Home | musiX</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg sticky-top">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <h1>
                    <a class="nav-link" href="index.html">musi<span>X</span></a>
                  </h1>
                </li>
              </ul>
            </div>
        </nav>

        <div class="container m-3">
          <div class="row">
            <div class="col">
              <table class="table table-hover table-borderless">
                <tr>
                  <td>
                    <b>Podcasts</b>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Liked</b>
                  </td>
                </tr>
                <tr>
                  <td>
                    <b>Playlists</b>
                  </td>
                </tr>
                <tr class="text-center">
                  <td>
                    <a href="#" data-toggle="modal" data-target="#newPlaylist"><i class="fas fa-plus"></i> New playlist</a>
                  </td>
                </tr>
                <?php while($data = mysqli_fetch_object($playlist)) { ?>
                  <tr>
                    <td>
                      <a href="playlist_detail.php?id=<?=$data->id?>"><?= $data->playlist_name ?></a>
                    </td>
                    <td>
                      <a href="delete.php?id=<?= $data-> id ?>"><i class="fas fa-times" aria-hidden="true" style="color:red"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <div class="col-6">
              <h4 class="text-center mb-5">Recommended for you</h4>
              <table class="table table-hover table-borderless">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Artist</th>
                  </tr>
                </thead>

                <tbody>
                <?php while($data = mysqli_fetch_object($song)) { ?>
                  <tr>
                    <td><?= $data->title ?></td>
                    <td><?= $data->artist ?></td>
                    <td>
                      <a href="recent.php?id=<?= $data->id?>"><i class="fas fa-play" aria-hidden="true" style="color:royalblue" data-toggle="tooltip" data-placement="top" title="Play"></i></a>
                    </td>
                    <td>
                      <a href="#"><i class="fas fa-plus" aria-hidden="true" style="color:royalblue" data-toggle="tooltip" data-placement="top" title="Add to playlist"></i></a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="col">
              <h4 class="text-center mb-5">Recently Played</h4>
              <table class="table table-hover table-borderless">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th><a href="clear.php" style="color:red!important">Clear</a></th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($data = mysqli_fetch_object($history)) { ?>
                    <tr>
                      <td><?= $data->title ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="modal fade" id="newPlaylist" tabindex="-1" role="dialog" aria-labelledby="newPlaylistTitle">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="newPlaylistTitle">Create new playlist</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="insert.php" method="post">
                <div class="modal-body">
                  <input type="text" class="form-control" placeholder="Playlist name" id="name" name="name">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Create</button>
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