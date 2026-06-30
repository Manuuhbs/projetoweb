<?php

require_once __DIR__ . '/../dao/BraceleteDao.php';

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
    if (!$this->validaCampos($bracelete)) {
      return false;
    }
    $dao = new BraceleteDao();
    $dao->salvar($bracelete);
    return true;
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
  public function validaCampos(Bracelete $bracelete)
  {
    if (
      empty($bracelete->getCdBarras()) ||
      empty($bracelete->getDescricao()) ||
      empty($bracelete->getPreco())
    ) {
      return false;
    } else {
      return true;
    }
  }

}