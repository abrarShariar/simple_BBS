<?php
  require_once('./connection.php');
  $title = $_POST['title'];
  $description = $_POST['description'];

  $sql = "INSERT INTO topics (title, description)
          VALUES ('$title', '$description')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: /simple_BBS/view_all.php");
    die();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
 ?>
