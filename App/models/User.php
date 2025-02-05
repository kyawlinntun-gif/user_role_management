<?php
namespace App\models;
use App\Core\Database;
class User
{
  public $name;
  public $email;
  public $password;
  public $role_id;

  public function save()
  {
    $database = new Database();
    $db = $database->getConnection();
    $stmt = $db->prepare("INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)");
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':role_id', $this->role_id);
    $stmt->execute();
  }
}