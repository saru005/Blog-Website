
<div class="col-md-4">
<?php
      if(isset($_GET['id']))
      {
?>
        <div class="card mb-3">
          <h5 class="card-header">Comments..</h5>
      <?php
            $comments = get_comments_by_post_id($db,$post_id);
            if(count($comments)<1)
            {
      ?>
                   <div class = "card-body"><p class=" text-center card-text">No Comments..</p></div>
                  
      <?php
            }
            foreach($comments as $cmnt)
            {
      ?>
              <div class="card-body">
              <h5 class="card-title"><?=$cmnt['user_name']?></h5>
              <span class ="text-secondary"><small><?=date('F,js,Y',strtotime($cmnt['comment_date']))?></small></span>
              <p class="card-text"><?=$cmnt['comment']?></p>
              
            </div>
          
      <?php
            }
      ?>
          </div>
<?php
      }
?>
          
 </div>