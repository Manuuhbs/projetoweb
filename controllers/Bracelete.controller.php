<?php

require_once __DIR__ . '/../dao/Bracelete.dao.php';

class BraceleteController
{
  public function listar()
  {
    $dao = new BraceleteDao();
    return $dao->listar();
  }

  public function buscarPorId($id)
  {
    $dao = new BraceleteDao();
    return $dao->buscarPorId($id);
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

  public function atualizar()
  {
    $bracelete = new Bracelete(
      $_POST['cdbarras'],
      $_POST['descricao'],
      $_POST['preco'],
      $_POST['idbracelete']
    );

    $dao = new BraceleteDao();
    $dao->atualizar($bracelete);
  }

  public function deletar()
  {
    $dao = new BraceleteDao();
    $dao->deletar($_POST['idbracelete']);

  }
}