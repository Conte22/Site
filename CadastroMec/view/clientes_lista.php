<?php
require_once __DIR__ . '/../controller/ClienteController.php';

$clientes = (new ClienteController())->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
</head>
<body style="font-family: sans-serif; margin: 30px;">
    <h2>Clientes Cadastrados</h2>
    <table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%;">
        <tr style="background: #f2f2f2;">
            <th>ID</th>
            <th>Nome</th>
            <th>CEP</th>
            <th>Cidade</th>
            <th>A&ccedil;&otilde;es</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $cliente->getId() ?></td>
                <td><?= htmlspecialchars($cliente->getNome(), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($cliente->getCep(), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($cliente->getCidade(), ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="clientes_edita.php?id=<?= $cliente->getId() ?>">Editar</a> |
                    <form action="clientes_deleta.php" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $cliente->getId() ?>">
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="clientes_cadastra.php">Novo Cliente</a> |
    <a href="index.php">Menu</a>
</body>
</html>
