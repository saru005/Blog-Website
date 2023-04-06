<div class="col-lg-11">
        <div style="margin-left:370px;" class="card">
        <div class="card-body">
          <h5 class="card-title">Manage Posts - </h5>
      
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Post Title</th>
                    <!-- <th scope="col">Post content</th> -->
                    <th scope="col">Post Date</th>
                    <th scope="col">Post Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
       <?php
                $count=1;
                $posts = get_all_posts($db);
                foreach($posts as $post)
                {
       ?>
                  <tr>
                    <th scope="row"><?=$count?></th>
                    <td><?=$post['title']?></td>
                    <!-- <td><?=$post['content']?></td> -->
                    <td><?=$post['created_at']?></td>
                    <td><?=get_category($db,$post['category_id'])?></td>
                    <td><a style="background-color:red;border:1px solid white;" class="btn btn-primary btn-sm" href="../includes/remove_post.php?id=<?=$post['Id']?>" role="button">Remove</a></td>
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