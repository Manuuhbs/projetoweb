<?php

require_once __DIR__ . '/../dao/ColarDao.php';

class ColarController
{
  public function listar()
  {
    $dao = new ColarDao();
    return $dao->listar();
  }

  public function buscarPorId($id)
  {
    $dao = new ColarDao();
    return $dao->buscarPorId($id);
  }

  public function salvar()
  {
    $colar = new Colar(
      $_POST['cdbarras'],
      $_POST['descricao'],
      $_POST['preco']
    );
    if (!$this->validaCampos($colar)) {
      return false;
    }
    $dao = new ColarDao();
    $dao->salvar($colar);
  }

  public function atualizar()
  {
    $colar = new Colar(
      $_POST['cdbarras'],
      $_POST['descricao'],
      $_POST['preco'],
      $_POST['idcolar']
    );

    $dao = new ColarDao();
    $dao->atualizar($colar);
  }

  public function deletar()
  {
    $dao = new ColarDao();
    $dao->deletar($_POST['idcolar']);

  }
  public function validaCampos(Colar $colar)
  {
    if (
      empty($colar->getCdBarras()) ||
      empty($colar->getDescricao()) ||
      empty($colar->getPreco())
    ) {
      return false;
    } else {
      return true;
    }
  }
}