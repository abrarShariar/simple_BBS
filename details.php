<?php
  require_once('./connection.php');
  $id=$_GET['id'];
  $sql = "select id, title, description from topics where id = $id";
  $topic_data = mysqli_query($conn, $sql);

  $sql = "select id, comment, created_at from comments where topic_id = $id";
  $comment_data = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>View all topic</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="./index.php">Bulletin Board</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Topics
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./add_topic.php">New</a>
              <a class="dropdown-item" href="./view_all.php">View All</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <br/>
      <?php  if(mysqli_num_rows($topic_data) > 0) {
        while($row = mysqli_fetch_assoc($topic_data)) {
            echo "<h1 style='text-align:center'>".$row['title']."</h1><br>";
            echo "<p style='text-align:center'>".$row['description']."</p>";
            echo "<hr>";
        }
      } else {
        echo "0 results";
      }
      ?>
      <br/>

      <form action="comment_submit.php" method="POST">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Comment</label>
          <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <input type="hidden" name="topic_id" value="<?php echo $id ?>"/>
        <button type="submit" class="btn btn-primary">Comment</button>
      </form>
      <br/>
      <hr/>
      <h2 style="text-align:center">List of all comments</h2>
      <br/>
      <?php  if(mysqli_num_rows($comment_data) > 0) {
        while($row = mysqli_fetch_assoc($comment_data)) {
            echo '<div class="alert alert-info" role="alert">';
            echo "<p style='text-align:center'>".$row['comment']."</p>";
            echo "<p style='text-align:center'>".$row['created_at']."</p>";
            echo "</div>";
        }
      } else {
        echo "0 comments";
      }
      ?>
    </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      </body>
    </html>
