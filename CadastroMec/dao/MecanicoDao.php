<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Mecanico.php';

class MecanicoDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->connection;
    }

    public function salvar(Mecanico $mecanico)
    {
        $stmt = $this->connection->prepare('INSERT INTO mecanicos (nome, especialidade, telefone) VALUES (?, ?, ?)');
        $stmt->execute([
            $mecanico->getNome(),
            $mecanico->getEspecialidade(),
            $mecanico->getTelefone(),
        ]);
    }

    public function listar()
    {
        $rows = $this->connection->query('SELECT * FROM mecanicos ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        $mecanicos = [];

        foreach ($rows as $row) {
            $mecanicos[] = new Mecanico($row['nome'], $row['especialidade'], $row['telefone'], $row['id']);
        }

        return $mecanicos;
    }

    public function buscarPorId($id)
    {
        $stmt = $this->connection->prepare('SELECT * FROM mecanicos WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new Mecanico($row['nome'], $row['especialidade'], $row['telefone'], $row['id']);
    }

    public function atualizar(Mecanico $mecanico)
    {
        $stmt = $this->connection->prepare('UPDATE mecanicos SET nome = ?, especialidade = ?, telefone = ? WHERE id = ?');
        $stmt->execute([
            $mecanico->getNome(),
            $mecanico->getEspecialidade(),
            $mecanico->getTelefone(),
            $mecanico->getId(),
        ]);
    }

    public function deletar($id)
    {
        $stmt = $this->connection->prepare('DELETE FROM mecanicos WHERE id = ?');
        $stmt->execute([$id]);
    }
}
