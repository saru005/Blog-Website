<?php
    require('includes/db.php');
    include('includes/functions.php');
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
          $post_id = $_GET['id'];
          $query = "select * from posts where Id=$post_id";
          $runquery = mysqli_query($db,$query);
          $post = mysqli_fetch_assoc($runquery);
        ?>

        <!-- title, date and category on the post page -->
            <div class="card mb-3">
                
                <div class="card-body">
                  <h5 class="card-title"><?=$post['title']?></h5>
                  <span class="badge bg-primary ">Posted on : <?=date('F,js,Y',strtotime($post['created_at']))?></span>
                  <span class="badge bg-danger"><?=get_category($db,$post['category_id'])?></span>
                  <div class="border-bottom mt-3"></div>
  <!-- post image slider  on the post page-->
<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <?php
      $post_images = get_image_by_post_id($db,$post_id);
      $c=1;
      foreach($post_images as $image)
      {
        if($c>1)
          $sw="";
        else
          $sw = "active";
    ?>
      <div class="carousel-item <?=$sw?>">
           <img src="images/<?=$image['img_name']?>" class="d-block w-100" alt="...">
      </div>

    <?php
        $c++;
      }
    ?>
    
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- post content on the post page -->

                  <p class="card-text"><?=$post['content']?></p>
                  <!-- Share buttons -->
                  <div class="addthis_inline_share_toolbox"></div>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Comment on this post..
</button>

                </div>
              </div>
<!-- Comment popup page -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Write comment on this post..</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <!-- Form -->
 <form action="includes/add_comment.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Comment</label>
    <input type="text" class="form-control" name="comment" id="exampleInputPassword1">
    <input type="hidden" name ="post_id" value="<?=$post_id?>">
  </div>
  <button type="submit" class="btn btn-primary">Add comment</button>
 </form>

      </div>
    </div>
  </div>
</div>





              <!-- Related post on the post page -->
            <div>
                  <h4>Related Posts</h4>
<?php
    $pquery = "SELECT * FROM posts WHERE category_id={$post['category_id']}";
    $prun = mysqli_query($db,$pquery);
    while($post = mysqli_fetch_assoc($prun))
    {
      if($post['Id']==$post_id)
        continue;
?>
<a href="post.php?id=<?=$post['Id']?>" style="text-decoration:none;color:black">
    <div class="card mb-3" style="max-width: 700px;">
      <div class="row g-0">
          <div class="col-md-5">
            <?php
            $img = get_one_image_by_post_id($db,$post['Id']);
            ?>
              <img src="images/<?=$img['img_name']?>" style="width:100%;" alt="...">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title"><?=$post['title']?></h5>
              <p class="card-text text-truncate"><?=$post['content']?></p>
              <p class="card-text"><small class="text-muted">Posted on : <?=date('F,js,Y',strtotime($post['created_at']))?></small></p>
          </div>
        </div>
      </div>
    </div>
</a>
<?php
    }
?>
                  
                   
  </div>
        
</div>
    <?php include_once('includes/sidebar.php'); ?>
    </div>

  
      
      
    <?php include_once('includes/footer.php'); ?> 
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-64125fe218a0cec7"></script>   
</body>
</html>