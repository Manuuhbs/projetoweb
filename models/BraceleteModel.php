<?php

class Bracelete
{
  private $idbracelete;
  private $cdbarras;
  private $descricao;
  private $preco;

  public function __construct($cdbarras, $descricao, $preco, $idbracelete = null)
  {
    $this->cdbarras = $cdbarras;
    $this->descricao = $descricao;
    $this->preco = $preco;
    $this->idbracelete = $idbracelete;
  }

  public function getId()
  {
    return $this->idbracelete;
  }

  public function getIdBracelete()
  {
    return $this->idbracelete;
  }

  public function getCdBarras()
  {
    return $this->cdbarras;
  }
  public function getDescricao()
  {
    return $this->descricao;
  }
  public function getPreco()
  {
    return $this->preco;
  }
}
