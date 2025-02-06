<?php
namespace App\Models;
use App\Core\Database;
use PDOException;

class Permission
{
  public $permission_name;
  public $description;

  public function save()
  {
    $database = new Database();
    $db = $database->getConnection();
    try {
      $stmt = $db->prepare("INSERT INTO permissions (permission_name, description) VALUES (:permission_name, :description)");
      $stmt->bindParam(':permission_name', $this->permission_name);
      $stmt->bindParam(":description", $this->description);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting permissions: " . $e->getMessage();
    }
  }
}