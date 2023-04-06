
<!-- No of posts in a category -->
<div class="col-lg-11">
        <div style="margin-left:370px;" class="card">
        <div class="card-body">
          <h5 class="card-title">Number of post in a Category - </h5>
      
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Category</th>
                    <th scope="col">No Of Post</th>
                  </tr>
                </thead>
                <tbody>
       <?php
                $count=1;
                $categories = getAllCategories($db);
                foreach($categories as $ct)
                {
       ?>
                  <tr>
                    <th scope="row"><?=$count?></th>
                    <td><?=$ct['name']?></td>
                    <td><?=get_num_of_post_by_cat($db,$ct['id']);?></td>
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