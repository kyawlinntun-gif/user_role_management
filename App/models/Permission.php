<?php
namespace App\Models;
use App\Core\Database;
use PDO;
use PDOException;

class Permission
{
  private $db;
  public $permission_name;
  public $description;

  public function __construct()
  {
    $database = new Database();
    $this->db = $database->getConnection();
  }

  public function save()
  {
    try {
      $stmt = $this->db->prepare("INSERT INTO permissions (permission_name, description) VALUES (:permission_name, :description)");
      $stmt->bindParam(':permission_name', $this->permission_name);
      $stmt->bindParam(":description", $this->description);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting permissions: " . $e->getMessage();
    }
  }

  public function getAllPermissions()
  {
    try {
      $stmt = $this->db->prepare("SELECT permission_id, permission_name, description FROM permissions");
      $stmt->execute();
      $permissions = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $permissions; 
    } catch (PDOException $e) {
      echo "Error fetching all permissions: " . $e->getMessage();
    }
  }
}