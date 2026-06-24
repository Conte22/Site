<?php
require_once __DIR__ . '/../controller/PecaController.php';

$pecas = (new PecaController())->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pe&ccedil;as</title>
</head>
<body style="font-family: sans-serif; margin: 30px;">
    <h2>Estoque de Pe&ccedil;as</h2>
    <table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%;">
        <tr style="background: #f2f2f2;">
            <th>ID</th>
            <th>Nome</th>
            <th>Pre&ccedil;o</th>
            <th>Estoque</th>
            <th>A&ccedil;&otilde;es</th>
        </tr>
        <?php foreach ($pecas as $peca): ?>
            <tr>
                <td><?= $peca->getId() ?></td>
                <td><?= htmlspecialchars($peca->getNome(), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($peca->getPrecoVenda(), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($peca->getEstoque(), ENT_QUOTES, 'UTF-8') ?> uni</td>
                <td>
                    <a href="pecas_edita.php?id=<?= $peca->getId() ?>">Editar</a> |
                    <form action="pecas_deleta.php" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $peca->getId() ?>">
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="pecas_cadastra.php">Nova Pe&ccedil;a</a> |
    <a href="index.php">Menu</a>
</body>
</html>
