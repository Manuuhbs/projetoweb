<?php
class Cliente
{
    private $idcliente;

    private $nome;

    private $dtNascimento;

    private $cep;

    private $bairro;

    private $rua;

    private $cidade;

    private $numero;

    private $estado;

    private $pais;

    private $complemento;

    public function __construct($nome, $dt_nascimento, $cep, $bairro, $rua, $cidade, $numero, $estado, $pais, $complemento = null, $idcliente = null)
    {

        $this->nome = $nome;
        $this->dtNascimento = $dt_nascimento;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->rua = $rua;
        $this->cidade = $cidade;
        $this->numero = $numero;
        $this->estado = $estado;
        $this->pais = $pais;
        $this->complemento = $complemento;
        $this->idcliente = $idcliente;
    }

    public function getIdcliente()
    {
        return $this->idcliente;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDtNascimento()
    {
        return $this->dtNascimento;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }
}