<!-- This is for menu -->
<div class="col-lg-11">
        <div style="margin-left:370px;" class="card">
        <div class="card-body">
          <h5 class="card-title">
            Manage Menu - <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal1">
        Add New Menu
       </button>
          </h5>
      
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
       <?php
                $count=1;
                $menus = get_Menu($db);
                foreach($menus as $menu)
                {
       ?>
                  <tr>
                    <th scope="row"><?=$count?></th>
                    <td><?=$menu['name']?></td>
                    <td><?=$menu['action']?></td>
                    <td><a style="background-color:red;border:1px solid white;" class="btn btn-primary btn-sm" href="../includes/remove_menu.php?id=<?=$menu['id']?>" role="button">Remove</a></td>
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


<!-- Add menu popup form -->
      <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Menu here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <!-- Form -->
 <form action="../includes/add_menu.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Menu Name</label>
    <input type="name" class="form-control" name="menu-name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Menu Link</label>
    <input type="name" class="form-control" name="menu-link" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <button type="submit" name="add-menu" class="btn btn-primary">Add</button>
 </form>

      </div>
    </div>
  </div>
</div>


<!-- This is for SubMenu -->
<div class="col-lg-11">
        <div style="margin-left:370px;" class="card">
        <div class="card-body">
          <h5 class="card-title">
            Manage SubMenu - <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal2">
        Add New SubMenu
       </button>
          </h5>
      
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Parent_Menu</th>
                    <th scope="col">Link</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
       <?php
                $count=1;
                $submenus = get_all_submenu($db);
                foreach($submenus as $submenu)
                {
       ?>
                  <tr>
                    <th scope="row"><?=$count?></th>
                    <td><?=$submenu['name']?></td>
                    <td><?=getMenuById($db,$submenu['parent_menu_id'])?></td>
                    <td><?=$submenu['action']?></td>
                    <td><a style="background-color:red;border:1px solid white;" class="btn btn-primary btn-sm" href="../includes/remove_submenu.php?id=<?=$submenu['id']?>" role="button">Remove</a></td>
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


<!-- Add SubMenu popup form -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Submenu here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <!-- Form -->
 <form action="../includes/add_submenu.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Suubmenu Name</label>
    <input type="name" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Select Parent Menu</label>
    <select class="form-control" name="parent_id" id="exampleInputEmail1" aria-describedby="emailHelp">
<?php
      $menus  = get_Menu($db);
      foreach($menus as $menu)
      {
?>
          <option value="<?=$menu['id']?>"><?=$menu['name']?></option>
<?php
      }
?>         
      
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">submenu Link</label>
    <input type="name" class="form-control" name="link" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <button type="submit" name="add-submenu" class="btn btn-primary">Add</button>
 </form>

      </div>
    </div>
  </div>
</div>