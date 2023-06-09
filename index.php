<?php
    require('includes/db.php');
    include('includes/functions.php');
    if(isset($_GET['page'])){
      $page = $_GET['page'];
    }
    else
    {
      $page = 1;
    }
    $post_per_page = 5;
    $result = ($page-1)* $post_per_page;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
      <?php include_once('includes/nav.php'); ?>  
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-md-8">

        <?php
        if(isset($_GET['search']))
        {
          $keyword = $_GET['search'];
          $query = "select * from posts where title LIKE '%$keyword%' ORDER BY Id DESC LIMIT $result,$post_per_page";
        }
        else
          $query = "select * from posts ORDER BY Id DESC LIMIT $result,$post_per_page";
          
          $runquery = mysqli_query($db,$query);
          while($post = mysqli_fetch_assoc($runquery)){
            ?>
            <a  href="post.php?id=<?=$post['Id']?>" style="color:black; text-decoration:none ">
                <div class="card mb-3" style="max-width: 800px;">
                  <div class="row g-0">
                    <div class="col-md-5" >
                      <?php
                      $img = get_one_image_by_post_id($db,$post['Id']);
                      ?>
                      <img src="images/<?=$img['img_name'];?>" style="width:100%;" alt="...">
                    </div>
                    <div class="col-md-7">
                      <div class="card-body">
                        <h5 class="card-title"><?=$post['Id']?><?=$post['title']?></h5>
                        <p class="card-text text-truncate"><?=$post['content']?></p>
                        <p class="card-text "><small class="text-muted">Posted on : <?=date('F,js,Y',strtotime($post['created_at']))?></small></p>
                    </div>
                  </div>
                </div>
              </div>
          </a>
            <?php
          }
        ?>
        
          
    </div>
    <!-- Sidebar section -->
    <?php include_once('includes/sidebar.php'); ?>
    </div>
    <!-- Next page URL  -->
    <?php
      if(isset($_GET['search']))
      {
        $keyword = $_GET['search'];
        $q = "select * from posts where title LIKE '%$keyword%'";
      }
      else
        $q = "select * from posts";
        
      $r = mysqli_query($db,$q);
      $total_post = mysqli_num_rows($r);
      $total_pages = ceil($total_post/$post_per_page);
      
    ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <?php
            if($page>1)
              $switch="";
            else
              $switch ="disabled";

            // Next page
            if($page<$total_pages)
              $nswitch="";
            else
              $nswitch ="disabled";
          ?>
          <li class="page-item <?=$switch?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <?php
            for($npage = 1;$npage<=$total_pages;$npage++){
            ?>
              <li class="page-item"><a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$npage?>"><?=$npage?></a></li>
          <?php
            }
          ?>
          
          
          <li class="page-item <?=$nswitch?>" >
            <a class="page-link" href="?<?php if(isset($_GET['search'])){echo "search=$keyword&";}?>page=<?=$page+1?>">Next</a>
          </li>
        </ul>
      </nav>
      
      <!-- Footer part  -->
        <?php include_once('includes/footer.php'); ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>