<div class="col-lg-11">
  <div style="margin-left:370px;" class="card">
  <div class="card-body">
    <h5 class="card-title">Add Post</h5>

        <form action="../includes/add_post.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post title</label>
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post Content</label>
            <textarea class="form-control" name="content" placeholder="Write your Blog here.." id="floatingTextarea" required></textarea>
          </div>
          <div class="mb-3 col-sm-6">
            <label for="exampleInputPassword1" class="form-label">Select Categories</label>
            <select class="form-select" name="category" aria-label="Default select example"required>
            <?php
                $categories = getAllCategories($db);
                foreach($categories as $category)
                {
            ?>
                    <option value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php
                }
            ?>
            </select>
          </div>
          <div class="mb-3 col-sm-6">
            <label for="formFile" class="form-label">Upload Images</label>
            <input class="form-control" type="file" name="post_image[]" id="formFile" accept="image/*" multiple required>
          </div>
          <button type="submit" class="btn btn-primary" name="submit" value="add Post" >Add post</button>
        </form>
  </div>
  </div>
</div>