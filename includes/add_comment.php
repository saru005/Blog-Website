<?php
    require('db.php');
    // print_r($_POST);
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $post_id = $_POST['post_id'];
    
    $query = "INSERT INTO comments(comment,user_name,post_id) VALUES ('$comment','$name',$post_id)";
    if(mysqli_query($db,$query))
        header("location:../post.php?id=$post_id");
    else
        echo "Comment not added..!";
?>