<?php
require_once __DIR__ . '/../App/Core/Database.php';
require_once __DIR__ . '/../seeder/UserSeeder.php';
require_once __DIR__ . '/../seeder/RoleSeeder.php';
use App\Core\Database;
// Run the seeder
$database = new Database();
$db = $database->getConnection();
$roleSeeder = new RoleSeeder($db);
$roleSeeder->run();
$userSeeder = new UserSeeder($db);
$userSeeder->run();