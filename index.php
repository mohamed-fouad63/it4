<?php
use Core\Application;
require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // تحديد مسار ملف .env
$dotenv->load(); // تحميل محتويات ملف .env
$app = new Application();
require_once __DIR__ . '/routes/web.php';
$app->run();
