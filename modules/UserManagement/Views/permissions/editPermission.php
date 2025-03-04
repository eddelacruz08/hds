
<br>
<div class="card bg-light ">
  <div class="card-body">
    <div class="row">
       <div class="col-md-2 offset-md-10">
         <?php if(user_link('edit-role-permissions', $_SESSION['userPermmissions'])): ?>
          <a href="<?= base_url() ?>permission/edit" class="btn btn-sm btn-primary btn-block float-right">Edit Permissions</a>
        <?php endif; ?>
       </div>
     </div>
    <br>
    <?php foreach($modules as $module): ?>
       <h3><?= ucwords($module['module_name']) ?></h3>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Function Name</th>
              <th>Allowed Roles</th>
            </tr>
          </thead>
          <tbody>
          <form method="post" action="<?= base_url() ?>permissions/edit">
          <?php foreach($permissions as $permission): ?>
            <?php if($permission['module_id'] == $module['id']): ?>
              <tr>
                <th scope="row"><?= $permission['order'] ?></th>
                <td><?= ucwords($permission['function_name']) ?></td>
                <td>
                  <?php foreach($roles as $role): ?>
                    <?php
                      $allowed_roles = substr($permission['allowed_roles'], 0, -1);
                      $allowed_roles = ltrim($allowed_roles, '[');
                      $finalAllowed = explode(',',$allowed_roles);
                      if(in_array($role['id'], $finalAllowed))
                      {
                        echo '<input type="checkbox" name="allowedUsers['.$permission['id'].']['.$role['id'].']" checked>';
                      }
                      else
                      {
                        echo '<input type="checkbox" name="allowedUsers['.$permission['id'].']['.$role['id'].']">';
                      }
                      echo ' '.$role['role_name'];
                    ?>
                  <?php endforeach; ?>
                </td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
          </tbody>
        </table>
    <?php endforeach; ?>
      <input type="submit" vaue="submit" class="btn btn-primary float-right">
    </form>
    <br><br><br>
  </div>
