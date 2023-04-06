<?php
    require("db.php");
    if(isset($_GET['id']))
    {
        $category_id  = $_GET['id'];
        $Query = "DELETE  FROM category WHERE id = $category_id";
        mysqli_query($db,$Query);
        header("location:../admin/index.php?managecategory&deleted");
    }
?>