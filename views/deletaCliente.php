<?php
require_once __DIR__ . '/../controllers/ClienteController.php';
require_once __DIR__ . '/../config/console.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ClienteController();
    $controller->deletar();
    header("Location: cliente.php");

    exit;
}

