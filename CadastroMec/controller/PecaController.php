<?php

require_once __DIR__ . '/../dao/PecaDao.php';

class PecaController
{
    public function listar()
    {
        return (new PecaDao())->listar();
    }

    public function buscarPorId($id)
    {
        return (new PecaDao())->buscarPorId($id);
    }

    public function salvar()
    {
        (new PecaDao())->salvar(new Peca(
            $_POST['nome'],
            $_POST['preco_venda'],
            $_POST['estoque']
        ));

        header('Location: pecas_lista.php');
        exit;
    }

    public function atualizar()
    {
        (new PecaDao())->atualizar(new Peca(
            $_POST['nome'],
            $_POST['preco_venda'],
            $_POST['estoque'],
            $_POST['id']
        ));

        header('Location: pecas_lista.php');
        exit;
    }

    public function deletar()
    {
        (new PecaDao())->deletar($_POST['id']);

        header('Location: pecas_lista.php');
        exit;
    }
}
