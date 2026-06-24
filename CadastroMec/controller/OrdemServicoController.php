<?php

require_once __DIR__ . '/../dao/OrdemServicoDao.php';

class OrdemServicoController
{
    public function listar()
    {
        return (new OrdemServicoDao())->listarComCliente();
    }

    public function buscarPorId($id)
    {
        return (new OrdemServicoDao())->buscarPorId($id);
    }

    public function salvar()
    {
        (new OrdemServicoDao())->salvar(new OrdemServico(
            $_POST['veiculo'],
            $_POST['ano'],
            $_POST['defeito'],
            $_POST['preco'],
            $_POST['cliente_id'] ?: null
        ));

        header('Location: lista.php?status=sucesso_cadastro');
        exit;
    }

    public function atualizar()
    {
        (new OrdemServicoDao())->atualizar(new OrdemServico(
            $_POST['veiculo'],
            $_POST['ano'],
            $_POST['defeito'],
            $_POST['preco'],
            $_POST['cliente_id'] ?: null,
            $_POST['id']
        ));

        header('Location: lista.php?status=sucesso_edicao');
        exit;
    }

    public function deletar()
    {
        (new OrdemServicoDao())->deletar($_POST['id']);

        header('Location: lista.php?status=sucesso_delecao');
        exit;
    }
}
