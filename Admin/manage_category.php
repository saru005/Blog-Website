
        <div class="col-lg-11">
        <div style="margin-left:370px;" class="card">
        <div class="card-body">
          <h5 class="card-title">
            Manage Category - <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add New Category
       </button>
          </h5>
      
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
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
                    <td><a style="background-color:red;border:1px solid white;" class="btn btn-primary btn-sm" href="../includes/remove_cat.php?id=<?=$ct['id']?>" role="button">Remove</a></td>
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

      <!-- Add category popup form -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Category here..</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <!-- Form -->
 <form action="../includes/add_cat.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Category Name</label>
    <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <button type="submit" name="add-cat" class="btn btn-primary">Add</button>
 </form>

      </div>
    </div>
  </div>
</div>