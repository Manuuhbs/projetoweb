<?php

class Colar
{
  private $idcolar;
  private $cdbarras;
  private $descricao;
  private $preco;

  public function __construct($cdbarras, $descricao, $preco, $idcolar = null)
  {
    $this->cdbarras = $cdbarras;
    $this->descricao = $descricao;
    $this->preco = $preco;
    $this->idcolar = $idcolar;
  }

  public function getId()
  {
    return $this->idcolar;
  }

  public function getIdColar()
  {
    return $this->idcolar;
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
