<?php
require_once __DIR__ . '/../controllers/Bracelete.controller.php';
require_once __DIR__ . '/../config/console.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    console_log("top");
    $controller = new BraceleteController();
    $controller->deletar();
    header("Location: bracelete.php");

    exit;
}

