<?php

require_once __DIR__ . '/../dao/Bracelete.dao.php'; // carrega o DAO (que já carrega Database e Model)

class BraceleteController
{
  public function listar()
  {
    $dao = new BraceleteDao();
    return $dao->listar();
  }

  public function salvar()
  {
    $bracelete = new Bracelete(
      $_POST['cdbarras'],
      $_POST['descricao'],
      $_POST['preco']       
    );

    $dao = new BraceleteDao();
    $dao->salvar($bracelete);
  }
}