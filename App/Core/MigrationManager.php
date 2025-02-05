<?php
namespace App\Core;
use PDO;
class MigrationManager
{
  private $pdo;
  private $migrationPath = __DIR__ . '/../../migrations/';

  public function __construct($pdo)
  {
    $this->pdo = $pdo;
  }

  public function migrate()
  {
    $migrateFiles = scandir($this->migrationPath);
    foreach ($migrateFiles as $file) {
      if ($file !== '.' && $file !== '..') {
        include_once $this->migrationPath . $file;
        $className = pathinfo($file, PATHINFO_FILENAME);
        $migration = new $className();
        $migration->up($this->pdo);
      }
    }
  }

  public function rollback()
  {
    $migrateFiles = scandir($this->migrationPath);
    // Reverse the order to drop tables in the correct sequence
    $migrateFiles = array_reverse($migrateFiles);
    foreach ($migrateFiles as $file) {
      if ($file !== '.' && $file !== '..') {
        include_once $this->migrationPath . $file;
        $className = pathinfo($file, PATHINFO_FILENAME);
        $migration = new $className();
        $migration->down($this->pdo);
      }
    }
  }

  public function refresh()
  {
    // Rollback all migrations
    $this->rollback();
    // Re-run all migrations
    $this->migrate();
  }
}