<?php

require_once __DIR__ . '/../dao/ClienteDao.php';

class ClienteController
{
    public function listar()
    {
        $dao = new ClienteDao();
        return $dao->listar();
    }

    public function buscarPorId($id)
    {
        $dao = new ClienteDao();
        return $dao->buscarPorId($id);
    }
    public function salvar()
    {
        $cliente = new Cliente(
            $_POST['nome'],
            $_POST['dt_nascimento'],
            $_POST['cep'],
            $_POST['bairro'],
            $_POST['rua'],
            $_POST['cidade'],
            $_POST['numero'],
            $_POST['estado'],
            $_POST['pais'],
            $_POST['complemento'],
        );
        if (!$this->validaCampos($cliente)) {
            return false;
        }
        $dao = new ClienteDao();
        $dao->salvar($cliente);
        return true;
    }
    public function atualizar()
    {
        $cliente = new Cliente(
            $_POST['nome'],
            $_POST['dt_nascimento'],
            $_POST['cep'],
            $_POST['bairro'],
            $_POST['rua'],
            $_POST['cidade'],
            $_POST['numero'],
            $_POST['estado'],
            trim($_POST['pais']),
            $_POST['complemento'],
            $_POST['idcliente']
        );
        $dao = new ClienteDao();
        $dao->atualizar($cliente);
    }

    public function deletar()
    {
        $dao = new ClienteDao();
        $dao->deletar($_POST['idcliente']);

    }
    public function validaCampos(Cliente $cliente)
    {
        if (
            empty($cliente->getNome()) ||
            empty($cliente->getDtNascimento()) ||
            empty($cliente->getCidade()) ||
            empty($cliente->getEstado()) ||
            empty($cliente->getPais()) ||
            empty($cliente->getComplemento())
        ) {
            return false;
        } else {
            return true;
        }
    }
}