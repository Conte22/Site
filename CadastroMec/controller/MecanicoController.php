<?php

require_once __DIR__ . '/../dao/MecanicoDao.php';

class MecanicoController
{
    public function listar()
    {
        return (new MecanicoDao())->listar();
    }

    public function buscarPorId($id)
    {
        return (new MecanicoDao())->buscarPorId($id);
    }

    public function salvar()
    {
        (new MecanicoDao())->salvar(new Mecanico(
            $_POST['nome'],
            $_POST['especialidade'],
            $_POST['telefone']
        ));

        header('Location: mecanicos_lista.php');
        exit;
    }

    public function atualizar()
    {
        (new MecanicoDao())->atualizar(new Mecanico(
            $_POST['nome'],
            $_POST['especialidade'],
            $_POST['telefone'],
            $_POST['id']
        ));

        header('Location: mecanicos_lista.php');
        exit;
    }

    public function deletar()
    {
        (new MecanicoDao())->deletar($_POST['id']);

        header('Location: mecanicos_lista.php');
        exit;
    }
}
