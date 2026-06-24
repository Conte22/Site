<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Peca.php';

class PecaDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->connection;
    }

    public function salvar(Peca $peca)
    {
        $stmt = $this->connection->prepare('INSERT INTO pecas (nome, preco_venda, estoque) VALUES (?, ?, ?)');
        $stmt->execute([
            $peca->getNome(),
            $peca->getPrecoVenda(),
            $peca->getEstoque(),
        ]);
    }

    public function listar()
    {
        $rows = $this->connection->query('SELECT * FROM pecas ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        $pecas = [];

        foreach ($rows as $row) {
            $pecas[] = new Peca($row['nome'], $row['preco_venda'], $row['estoque'], $row['id']);
        }

        return $pecas;
    }

    public function buscarPorId($id)
    {
        $stmt = $this->connection->prepare('SELECT * FROM pecas WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Peca($row['nome'], $row['preco_venda'], $row['estoque'], $row['id']);
    }

    public function atualizar(Peca $peca)
    {
        $stmt = $this->connection->prepare('UPDATE pecas SET nome = ?, preco_venda = ?, estoque = ? WHERE id = ?');
        $stmt->execute([
            $peca->getNome(),
            $peca->getPrecoVenda(),
            $peca->getEstoque(),
            $peca->getId(),
        ]);
    }

    public function deletar($id)
    {
        $stmt = $this->connection->prepare('DELETE FROM pecas WHERE id = ?');
        $stmt->execute([$id]);
    }
}
