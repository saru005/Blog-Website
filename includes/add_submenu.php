<?php
    require('db.php');
    if(isset($_POST['add-submenu']))
    {
        print_r($_POST);
        $sname = $_POST['name'];
        $parentid = $_POST['parent_id'];
        $slink = $_POST['link'];
        mysqli_query($db,"INSERT INTO submenu(parent_menu_id,name,action) VALUES ($parentid,'$sname','$slink')");
        header("location:../admin/index.php?managemenu&added");
     }
?>