<?php
require_once __DIR__ . '/../App/Core/Database.php';
require_once __DIR__ . '/../seeder/UserSeeder.php';
use App\Core\Database;
// Run the seeder
$database = new Database();
$db = $database->getConnection();
$seeder = new UserSeeder($db);
$seeder->run();