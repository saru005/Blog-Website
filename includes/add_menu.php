<?php
    require('db.php');
    if(isset($_POST['add-menu']))
    {
        $mname = $_POST['menu-name'];
        $mlink = $_POST['menu-link'];
        mysqli_query($db,"INSERT INTO menu(name,action) VALUES('$mname','$mlink')");
        header("location:../admin/index.php?managemenu&added");
    }
?>