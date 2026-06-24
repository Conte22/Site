<?php

require_once __DIR__ . '/../dao/ClienteDao.php';

class ClienteController
{
    public function listar()
    {
        return (new ClienteDao())->listar();
    }

    public function buscarPorId($id)
    {
        return (new ClienteDao())->buscarPorId($id);
    }

    public function salvar()
    {
        (new ClienteDao())->salvar(new Cliente(
            $_POST['nome'],
            $_POST['cep'],
            $_POST['cidade'],
            $_POST['bairro'],
            $_POST['rua']
        ));

        header('Location: clientes_lista.php?status=sucesso_cadastro');
        exit;
    }

    public function atualizar()
    {
        (new ClienteDao())->atualizar(new Cliente(
            $_POST['nome'],
            $_POST['cep'],
            $_POST['cidade'],
            $_POST['bairro'],
            $_POST['rua'],
            $_POST['id']
        ));

        header('Location: clientes_lista.php?status=sucesso_edicao');
        exit;
    }

    public function deletar()
    {
        (new ClienteDao())->deletar($_POST['id']);

        header('Location: clientes_lista.php?status=sucesso_delecao');
        exit;
    }
}
