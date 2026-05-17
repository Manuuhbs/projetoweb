<?php

require_once __DIR__ . '/../dao/Colar.dao.php'; // carrega o DAO (que já carrega Database e Model)

class ColarController
{
  public function listar()
  {
    $dao = new ColarDao();
    return $dao->listar();
  }

  public function salvar()
  {
    $colar = new Colar(
      $_POST['cdbarras'],
      $_POST['descricao'],
      $_POST['preco']       
    );

    $dao = new ColarDao();
    $dao->salvar($colar);

  }
}