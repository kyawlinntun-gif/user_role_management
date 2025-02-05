<?php
require_once __DIR__ . '/../App/Core/Database.php';
use App\Core\Database;
class UserSeeder
{
  private $db;
  public function __construct($db)
  {
    $this->db = $db;
  }
  public function run()
  {
    $users = [
      ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => password_hash('password', PASSWORD_BCRYPT), 'role_id' => 1],
      ['name' => 'user', 'email' => 'user@gmail.com', 'password' => password_hash('password', PASSWORD_BCRYPT), 'role_id' => 2],
    ];
    foreach ($users as $user) {
      try {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)");
        $stmt->execute($user);
      } catch (PDOException $e) {
        echo "Error inserting role " . $user['name'] . ": " . $e->getMessage();
      }
    }
  }
}