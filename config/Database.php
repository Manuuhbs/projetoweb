<?php
require_once __DIR__ . '/Env.php';

class Database
{
  public $connection;

  public function __construct()
  {
    $host = getenv('DB_HOST') ?: 'localhost';
    $porta = getenv('DB_PORT') ?: '5432';
    $database = getenv('DB_NAME') ?: 'postgres';
    $usuario = getenv('DB_USER') ?: 'postgres';
    $senha = getenv('DB_PASS') ?: '';

    $dsn = "pgsql:host=$host;port=$porta;dbname=$database";

    $this->connection = new PDO($dsn, $usuario, $senha);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}