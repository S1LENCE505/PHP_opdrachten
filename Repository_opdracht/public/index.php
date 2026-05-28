<?php
// declare(strict_types=1);  // ← must be first, right after <?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Repositories\UserRepository;

$pdo = new PDO('mysql:host=localhost;dbname=userrepo', 'root', 'Robbe2009');
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$userRepository = new UserRepository($pdo);
