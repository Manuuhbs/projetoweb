<?php
class Database
{
  public $connection;

  public function __construct()
  {
    $host = "localhost";
    $porta = "5432";
    $database = "joalheria";
    $usuario = "postgres";
    $senha = "postgres";

    $dsn = "pgsql:host=$host;port=$porta;dbname=$database";

    $this->connection = new PDO($dsn, $usuario, $senha);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}