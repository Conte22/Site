<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/OrdemServico.php';

class OrdemServicoDao
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new Database())->connection;
    }

    public function salvar(OrdemServico $ordemServico)
    {
        $stmt = $this->connection->prepare('INSERT INTO ordens_servico (veiculo, ano, defeito, preco, cliente_id) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([
            $ordemServico->getVeiculo(),
            $ordemServico->getAno(),
            $ordemServico->getDefeito(),
            $ordemServico->getPreco(),
            $ordemServico->getClienteId() ?: null,
        ]);
    }

    public function listarComCliente()
    {
        return $this->connection
            ->query('SELECT os.*, c.nome AS nome_cliente FROM ordens_servico os LEFT JOIN clientes c ON os.cliente_id = c.id ORDER BY os.id DESC')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id)
    {
        $stmt = $this->connection->prepare('SELECT * FROM ordens_servico WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        return new OrdemServico(
            $row['veiculo'],
            $row['ano'],
            $row['defeito'],
            $row['preco'],
            $row['cliente_id'],
            $row['id']
        );
    }

    public function atualizar(OrdemServico $ordemServico)
    {
        $stmt = $this->connection->prepare('UPDATE ordens_servico SET veiculo = ?, ano = ?, defeito = ?, preco = ?, cliente_id = ? WHERE id = ?');
        $stmt->execute([
            $ordemServico->getVeiculo(),
            $ordemServico->getAno(),
            $ordemServico->getDefeito(),
            $ordemServico->getPreco(),
            $ordemServico->getClienteId() ?: null,
            $ordemServico->getId(),
        ]);
    }

    public function deletar($id)
    {
        $stmt = $this->connection->prepare('DELETE FROM ordens_servico WHERE id = ?');
        $stmt->execute([$id]);
    }
}
