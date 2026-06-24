<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Cliente.php';

class ClienteDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->connection;
    }

    public function salvar(Cliente $cliente)
    {
        $stmt = $this->connection->prepare('INSERT INTO clientes (nome, cep, cidade, bairro, rua) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([
            $cliente->getNome(),
            $cliente->getCep(),
            $cliente->getCidade(),
            $cliente->getBairro(),
            $cliente->getRua(),
        ]);
    }

    public function listar()
    {
        $rows = $this->connection->query('SELECT * FROM clientes ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        $clientes = [];

        foreach ($rows as $row) {
            $clientes[] = new Cliente(
                $row['nome'],
                $row['cep'],
                $row['cidade'],
                $row['bairro'],
                $row['rua'],
                $row['id']
            );
        }

        return $clientes;
    }

    public function buscarPorId($id)
    {
        $stmt = $this->connection->prepare('SELECT * FROM clientes WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Cliente($row['nome'], $row['cep'], $row['cidade'], $row['bairro'], $row['rua'], $row['id']);
    }

    public function atualizar(Cliente $cliente)
    {
        $stmt = $this->connection->prepare('UPDATE clientes SET nome = ?, cep = ?, cidade = ?, bairro = ?, rua = ? WHERE id = ?');
        $stmt->execute([
            $cliente->getNome(),
            $cliente->getCep(),
            $cliente->getCidade(),
            $cliente->getBairro(),
            $cliente->getRua(),
            $cliente->getId(),
        ]);
    }

    public function deletar($id)
    {
        $stmt = $this->connection->prepare('DELETE FROM clientes WHERE id = ?');
        $stmt->execute([$id]);
    }
}
