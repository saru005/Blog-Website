<?php
    require('db.php');
    if(isset($_POST['add-cat']))
    {
        $catName = $_POST['name'];
        mysqli_query($db,"INSERT INTO category(name) VALUES('$catName')");
        header("location:../admin/index.php?managecategory&added");
    }
?>