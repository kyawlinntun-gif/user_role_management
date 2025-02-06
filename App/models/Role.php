<?php
namespace App\Models;
use App\Core\Database;
use PDOException;

class Role
{
  public $role_name;
  public $description;

  public function save()
  {
    $database = new Database();
    $db = $database->getConnection();
    try {
      $stmt = $db->prepare("INSERT INTO roles (role_name, description) VALUES (:role_name, :description)");
      $stmt->bindParam(':role_name', $this->role_name);
      $stmt->bindParam(':description', $this->description);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting roles: " . $e->getMessage();
    }
  }
}