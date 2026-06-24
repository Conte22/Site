<?php
require_once __DIR__ . '/../controller/OrdemServicoController.php';
require_once __DIR__ . '/../controller/ClienteController.php';

$ordemServicoController = new OrdemServicoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ordemServicoController->atualizar();
}

$ordem = $ordemServicoController->buscarPorId($_GET['id']);
$clientes = (new ClienteController())->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Ordem de Servi&ccedil;o</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Editar Ordem de Servi&ccedil;o</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $ordem->getId() ?>">

        Ve&iacute;culo *<br>
        <input type="text" name="veiculo" value="<?= htmlspecialchars($ordem->getVeiculo(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Ano *<br>
        <input type="text" name="ano" value="<?= htmlspecialchars($ordem->getAno(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Defeito *<br>
        <textarea name="defeito" required><?= htmlspecialchars($ordem->getDefeito(), ENT_QUOTES, 'UTF-8') ?></textarea><br><br>

        Pre&ccedil;o *<br>
        <input type="text" name="preco" value="<?= htmlspecialchars($ordem->getPreco(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Cliente<br>
        <select name="cliente_id">
            <option value="">-- Sem vinculo --</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente->getId() ?>" <?= $cliente->getId() == $ordem->getClienteId() ? 'selected' : '' ?>>
                    <?= htmlspecialchars($cliente->getNome(), ENT_QUOTES, 'UTF-8') ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
