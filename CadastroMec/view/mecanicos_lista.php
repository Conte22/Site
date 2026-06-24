<?php
require_once __DIR__ . '/../controller/MecanicoController.php';

$mecanicos = (new MecanicoController())->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mec&acirc;nicos</title>
</head>
<body style="font-family: sans-serif; margin: 30px;">
    <h2>Mec&acirc;nicos da Oficina</h2>
    <table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%;">
        <tr style="background: #f2f2f2;">
            <th>ID</th>
            <th>Nome</th>
            <th>Especialidade</th>
            <th>Telefone</th>
            <th>A&ccedil;&otilde;es</th>
        </tr>
        <?php foreach ($mecanicos as $mecanico): ?>
            <tr>
                <td><?= $mecanico->getId() ?></td>
                <td><?= htmlspecialchars($mecanico->getNome(), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($mecanico->getEspecialidade(), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($mecanico->getTelefone(), ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <a href="mecanicos_edita.php?id=<?= $mecanico->getId() ?>">Editar</a> |
                    <form action="mecanicos_deleta.php" method="POST" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $mecanico->getId() ?>">
                        <button type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="mecanicos_cadastra.php">Novo Mec&acirc;nico</a> |
    <a href="index.php">Menu</a>
</body>
</html>
