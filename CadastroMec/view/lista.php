<?php
require_once __DIR__ . '/../controller/OrdemServicoController.php';

$ordens = (new OrdemServicoController())->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Ordens de Servi&ccedil;o</title>
</head>
<body style="font-family: sans-serif; margin: 30px;">
    <h2>Ordens de Servi&ccedil;o</h2>
    <table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%;">
        <tr style="background: #f2f2f2;">
            <th>ID</th>
            <th>Ve&iacute;culo</th>
            <th>Defeito</th>
            <th>Pre&ccedil;o</th>
            <th>Propriet&aacute;rio</th>
            <th>A&ccedil;&otilde;es</th>
        </tr>
        <?php foreach ($ordens as $ordem): ?>
            <tr>
                <td><?= $ordem['id'] ?></td>
                <td><?= htmlspecialchars($ordem['veiculo'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($ordem['defeito'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($ordem['preco'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($ordem['nome_cliente'] ?? 'Sem vinculo', ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="edita.php?id=<?= $ordem['id'] ?>">Editar</a> |
                    <form action="deleta.php" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $ordem['id'] ?>">
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="cadastra.php">Nova Ordem de Servi&ccedil;o</a> |
    <a href="index.php">Menu</a>
</body>
</html>
