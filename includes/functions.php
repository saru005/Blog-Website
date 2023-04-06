
<?php

    function getSubmenuNo($db,$menu_id)
    {
        $run = mysqli_query($db,"SELECT * FROM submenu WHERE parent_menu_id = $menu_id");
        $no= mysqli_num_rows($run);
        return $no;
    }
    function get_submenu($db,$menu_id)
    {
        $runQ = mysqli_query($db,"select * from submenu where parent_menu_id=$menu_id");
        $submenu = array();
        while($d=mysqli_fetch_assoc($runQ))
        {
            $submenu[] = $d;
        }
        
        return $submenu;
    }
    function get_all_submenu($db)
    {
        $runQ = mysqli_query($db,"select * from submenu");
        $submenu = array();
        while($d=mysqli_fetch_assoc($runQ))
        {
            $submenu[] = $d;
        }
        
        return $submenu;
    }
    function get_Menu($db)
    {
        $run=mysqli_query($db,"SELECT * FROM menu");
        $menu=array();
        while($d=mysqli_fetch_assoc($run))
            $menu[] = $d;

        return $menu;
    }
    function get_category($db,$category_id)
    {
        if($category_id==null)
            return "";
        $q = "SELECT * FROM category WHERE id = $category_id";
        $run = mysqli_query($db,$q);
        $data = mysqli_fetch_assoc($run);
        if($data==null)
            $cat = "";
        else
            $cat = $data['name'];
        return $cat;
        
    }
    function getAllCategories($db)
    {
        $runQ = mysqli_query($db,"select * from category");
        $cat = array();
        while($d=mysqli_fetch_assoc($runQ))
        {
            $cat[] = $d;
        }
        
        return $cat;
    }
    function get_image_by_post_id($db,$post_id)
    {
        $runQ = mysqli_query($db,"select * from images where post_id=$post_id");
        $data = array();
        while($d=mysqli_fetch_assoc($runQ))
        {
            $data[] = $d;
        }
        return $data;
    }
    function get_one_image_by_post_id($db,$post_id)
    {
        $runQ = mysqli_query($db,"select * from images where post_id=$post_id");
        return mysqli_fetch_assoc($runQ);
        
    }
    function get_comments_by_post_id($db,$post_id)
    {
        $runQ =mysqli_query($db,"SELECT * FROM comments WHERE post_id=$post_id ORDER BY id DESC");
        $data =array();
        while($d = mysqli_fetch_assoc($runQ))
            $data[]=$d;

        return $data;
    }

    function getAdminInfo($db,$email)
    {
        $runQ = mysqli_query($db,"select * from admin where email='$email'");
        $d=mysqli_fetch_assoc($runQ);
        
        return $d;
    }
    function getMenuById($db,$parentid)
    {
        $run = mysqli_query($db,"SELECT name FROM menu WHERE id = $parentid");
        $menu = mysqli_fetch_assoc($run);
        if($menu!=null)
            $m=$menu['name'];
        else
            $m="";

        return $m;
    }
    function get_all_posts($db)
    {
        $run = mysqli_query($db,"SELECT * FROM posts");
        $data = array();
        while($d=mysqli_fetch_assoc($run))
                $data[]=$d;
        return $data;
    }
    function get_post_title($db,$id)
    {
        $run = mysqli_query($db,"SELECT title FROM posts WHERE Id=$id");
        $data=mysqli_fetch_assoc($run);
        if($data!=null)
            return $data['title'];
        else
            return "";
    }
    function get_all_comments($db)
    {
        $run = mysqli_query($db,"SELECT * FROM comments");
        $data = array();
        while($d=mysqli_fetch_assoc($run))
        {
            $data[] = $d;
        }
        return $data;
    }
    function getNumberOfPosts($db)
    {
        $run = mysqli_query($db,"SELECT * FROM posts");
        return mysqli_num_rows($run);
    }
    function getNumberOfComments($db)
    {
        $run = mysqli_query($db,"SELECT * FROM comments");
        return mysqli_num_rows($run);
    }
    function getNumberOfCategories($db)
    {
        $run = mysqli_query($db,"SELECT * FROM category");
        return mysqli_num_rows($run);
    }
    function get_num_of_post_by_cat($db,$id)
    {
        $run = mysqli_query($db,"SELECT * FROM posts WHERE category_id=$id");
        return mysqli_num_rows($run);
    }
?>