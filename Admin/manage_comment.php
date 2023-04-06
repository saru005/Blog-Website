<div class="col-lg-11">
        <div style="margin-left:370px;" class="card">
        <div class="card-body">
          <h5 class="card-title">Manage Comments - </h5>
      
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Comment</th>
                    <th scope="col">Post title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
       <?php
                $count=1;
                $comments = get_all_comments($db);
                foreach($comments as $comment)
                {
       ?>
                  <tr>
                    <th scope="row"><?=$count?></th>
                    <td><?=$comment['user_name']?></td>
                    <td><?=$comment['comment']?></td>
                    <td><?=get_post_title($db,$comment['post_id'])?></td>
                    <td><?=$comment['comment_date']?></td>
                    
                    <td><a style="background-color:red;border:1px solid white;" class="btn btn-primary btn-sm" href="../includes/remove_comment.php?id=<?=$comment['id']?>" role="button">Remove</a></td>
                  </tr>
       <?php
                $count++;
                }
       ?>
                  
      
                </tbody>
            </table>
        </div>
        </div>
      </div>