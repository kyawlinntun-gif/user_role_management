<?php
namespace App\Models;
use App\Core\Database;
use PDO;
use PDOException;

class User
{
  private $db;
  public $name;
  public $email;
  public $password;
  public $role_id;

  public function __construct()
  {
    $database = new Database();
    $this->db = $database->getConnection();
  }

  public function save()
  {
    try {
      $stmt = $this->db->prepare("INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)");
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':password', $this->password);
      $stmt->bindParam(':role_id', $this->role_id);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting users:" . $e->getMessage();
    }
  }

  public function update($id)
  {
    try {
      $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email, role_id = :role_id WHERE user_id = :id");
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':role_id', $this->role_id);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting users: " . $e->getMessage();
    }
  }

  public function getUserByEmail($email)
  {
    try {
      $stmt = $this->db->prepare("SELECT user_id, name, email, role_name FROM users LEFT JOIN roles ON users.role_id = roles.role_id WHERE email = :email");
      $stmt->bindParam(":email", $email, PDO::PARAM_STR);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user;
    } catch (PDOException $e) {
      echo "Error fetching user by email: " . $e->getMessage();
    }
  }

  public function getAllUsers()
  {
    try {
      $stmt = $this->db->prepare("SELECT user_id, name, email, role_name FROM users LEFT JOIN roles ON users.role_id = roles.role_id");
      $stmt->execute();
      $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $users;
    } catch (PDOException $e) {
      echo "Error fetching all users: " . $e->getMessage();
    }
  }

  public function getUserById($id)
  {
    try {
      $stmt = $this->db->prepare("SELECT user_id, name, email, users.role_id, role_name FROM users LEFT JOIN roles ON users.role_id = roles.role_id WHERE users.user_id = :id");
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user;
    } catch (PDOException $e) {
      echo "Error fetching user by id: " . $e->getMessage();
    }
  }

  public function destroy($id)
  {
    try {
      $stmt = $this->db->prepare("DELETE FROM users WHERE user_id = :id");
      $stmt->bindParam(":id", $id, PDO::PARAM_INT);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error fetching user by id: " . $e->getMessage();
    }
  }
}