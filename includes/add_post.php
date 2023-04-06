<?php

    require('db.php');
    if(isset($_POST['submit']))
    {
        $ptitle = $_POST['title'];
        $pcontent = $_POST['content'];
        $pcategory_id = $_POST['category'];
        $query = "INSERT INTO posts (title,content,category_id) VALUES('$ptitle','$pcontent',$pcategory_id)";
        $run = mysqli_query($db,$query);
        $post_id = mysqli_insert_id($db);
        // images
        $image_name = $_FILES['post_image']['name'];
        $tmp_name = $_FILES['post_image']['tmp_name'];
        foreach($image_name as $index=>$img)
        {
            if(move_uploaded_file($tmp_name[$index],"../images/$img"))
            {
                $query = "INSERT INTO images (post_id,img_name) VALUES ($post_id,'$img')";
                $run = mysqli_query($db,$query);
            }
        }
        header("location:../admin/index.php?managepost");
    }
?>