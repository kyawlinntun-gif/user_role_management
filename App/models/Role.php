<?php
namespace App\Models;
use PDO;
use PDOException;
use App\Core\Database;

class Role
{
  private $db;
  public $role_name;
  public $description;

  public function __construct()
  {
    $database = new Database();
    $this->db = $database->getConnection();
  }

  public function save()
  {
    try {
      $stmt = $this->db->prepare("INSERT INTO roles (role_name, description) VALUES (:role_name, :description)");
      $stmt->bindParam(':role_name', $this->role_name);
      $stmt->bindParam(':description', $this->description);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting roles: " . $e->getMessage();
    }
  }

  public function getAllRoles()
  {
    try {
      $stmt = $this->db->prepare("SELECT role_id, role_name FROM roles");
      $stmt->execute();
      $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $roles;
    } catch (PDOException $e) {
      echo "Error fetching all roles: " . $e->getMessage();
    }
  }
}