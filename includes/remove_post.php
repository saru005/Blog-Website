<?php
    require('db.php');
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        mysqli_query($db,"DELETE FROM posts WHERE Id = $id");
        mysqli_query($db,"DELETE FROM comments WHERE post_id = $id");
        header("location:../admin/index.php?managepost&deleted");
    }
?>