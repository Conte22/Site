<?php
require_once __DIR__ . '/../controller/PecaController.php';

$pecaController = new PecaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pecaController->atualizar();
}

$peca = $pecaController->buscarPorId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Pe&ccedil;a</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Editar Pe&ccedil;a</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $peca->getId() ?>">

        Nome da Pe&ccedil;a *<br>
        <input type="text" name="nome" value="<?= htmlspecialchars($peca->getNome(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Pre&ccedil;o *<br>
        <input type="text" name="preco_venda" value="<?= htmlspecialchars($peca->getPrecoVenda(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Estoque *<br>
        <input type="number" name="estoque" value="<?= htmlspecialchars($peca->getEstoque(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
