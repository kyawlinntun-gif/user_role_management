<?php
namespace App\Seeder;
require_once __DIR__ . '/../Models/Permission.php';
use App\Models\Permission;
class PermissionSeeder
{
  public function run()
  {
    $permissions = [
      ['permission_name' => 'create_users', 'description' => 'can create users'],
      ['permission_name' => 'read_users', 'description' => 'can read users'],
      ['permission_name' => 'update_users', 'description' => 'can update users'],
      ['permission_name' => 'delete_users', 'description' => 'can delete users']
    ];
    foreach($permissions as $new_permission) {
      $permission = new Permission();
      $permission->permission_name = $new_permission['permission_name'];
      $permission->description = $new_permission['description'];
      $permission->save();
    }
  }
}