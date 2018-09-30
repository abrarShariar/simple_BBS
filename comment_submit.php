<?php
    require_once('./connection.php');
    $comment = $_POST['comment'];
    $topic_id = $_POST['topic_id'];

    $sql = "INSERT INTO comments (comment, topic_id)
            VALUES ('$comment', $topic_id)";

            if ($conn->query($sql) === TRUE) {
              echo "Comment successfully";
              header("Location: /simple_BBS/details.php?id=$topic_id");
              die();
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
?>
