<?php
namespace App\Models;
use App\Core\Database;
use PDOException;
class Feature
{
  public $feature_name;
  public $description;

  public function save()
  {
    $database = new Database();
    $db = $database->getConnection();
    try {
      $stmt = $db->prepare("INSERT INTO features (feature_name, description) VALUES (:feature_name, :description)");
      $stmt->bindParam(":feature_name", $this->feature_name);
      $stmt->bindParam(":description", $this->description);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting features: " . $e->getMessage();
    }
  }
}