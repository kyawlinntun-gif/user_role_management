<?php
namespace App\Models;
use App\Core\Database;
use PDO;
use PDOException;
class Feature
{
  private $db;
  public $feature_name;
  public $description;

  public function __construct()
  {
    $database = new Database();
    $this->db = $database->getConnection();
  }

  public function save()
  {
    try {
      $stmt = $this->db->prepare("INSERT INTO features (feature_name, description) VALUES (:feature_name, :description)");
      $stmt->bindParam(":feature_name", $this->feature_name);
      $stmt->bindParam(":description", $this->description);
      $stmt->execute();
    } catch (PDOException $e) {
      echo "Error inserting features: " . $e->getMessage();
    }
  }

  public function getAllFeatures()
  {
    try {
      $stmt = $this->db->prepare("SELECT feature_id, feature_name, description FROM features");
      $stmt->execute();
      $features = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $features;
    } catch (PDOException $e) {
      echo "Error getting features: " . $e->getMessage();
    }
  }
}