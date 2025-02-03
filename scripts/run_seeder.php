<?php
require_once __DIR__ . '/../seeder/UserSeeder.php';
// Run the seeder
$database = new Database();
$db = $database->getConnection();
$seeder = new UserSeeder($db);
$seeder->run();