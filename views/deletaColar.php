<?php
require_once __DIR__ . '/../controllers/ColarController.php';
require_once __DIR__ . '/../config/console.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    console_log("top");
    $controller = new ColarController();
    $controller->deletar();
    header("Location: colar.php");
    exit;
}