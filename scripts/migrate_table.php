<?php
require_once __DIR__ . '/../App/Core/Database.php';
require_once __DIR__ . '/../App/models/User.php';
// Initialize database connection
$database = new Database();
$db = $database->getConnection();
// Create User table
$user = new User($db);
$user->createTable();