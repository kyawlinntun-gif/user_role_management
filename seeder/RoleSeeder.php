<?php
require_once __DIR__ . '/../App/Core/Database.php';
use App\Core\Database;
class RoleSeeder
{
  private $db;
  public function __construct($db)
  {
    $this->db = $db;
  }
  public function run()
  {
    $roles = [
      ['role_name' => 'Admin', 'description' => 'Administrator with full access'],
      ['role_name' => 'Editor', 'description' => 'Can edit content'],
      ['role_name' => 'Viewer', 'description' => 'Can view content']
    ];
    foreach ($roles as $role) {
      try {
        $stmt = $this->db->prepare("INSERT INTO roles (role_name, description) VALUES (:role_name, :description)");
        $stmt->execute($role);
      } catch (PDOException $e) {
        echo "Error inserting role " . $role['role_name'] . ": " . $e->getMessage();
      }
    }
  }
}