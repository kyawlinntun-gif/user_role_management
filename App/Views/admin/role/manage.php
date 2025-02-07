<?php view('admin.layouts.header', ['title' => 'All Roles / Manage role']) ?>
<?php view('admin.layouts.asidebar') ?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php view('admin.layouts.navbar') ?>
  <div class="container-fluid py-2">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">All Roles / Manage role</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="row">
              <div class="col-md-6 offset-md-2">
              <form role="form" method="POST" action="/admin/roles/<?= $roles[0]['role_id']; ?>/manage">
                  <h6><?= ucfirst($roles[0]['role_name']) ?></h6>
                  <select name="permissions[]" multiple class="form-control">
                    <?php foreach ($permissions as $permission) : ?>
                        <option value="<?= $permission['permission_id']; ?>"
                        <?= in_array($permission['permission_id'], $permissionByRole) ? 'selected' : ''; ?>>
                            <?= $permission['permission_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                  <div>
                    <button type="submit" class="btn btn-lg bg-gradient-dark btn-lg mt-4 mb-0">Save</button>
                  </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php view('admin.layouts.footer'); ?>