<?php
    require("db.php");
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        mysqli_query($db,"DELETE FROM submenu WHERE id = $id");
        header("location:../admin/index.php?managemenu&deleted");
    }
?>