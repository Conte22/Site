<?php
require_once __DIR__ . '/../controller/ClienteController.php';

$clienteController = new ClienteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clienteController->atualizar();
}

$cliente = $clienteController->buscarPorId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Editar Cliente</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $cliente->getId() ?>">

        Nome *<br>
        <input type="text" name="nome" value="<?= htmlspecialchars($cliente->getNome(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        CEP *<br>
        <input type="text" name="cep" value="<?= htmlspecialchars($cliente->getCep(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Cidade<br>
        <input type="text" name="cidade" value="<?= htmlspecialchars($cliente->getCidade(), ENT_QUOTES, 'UTF-8') ?>"><br><br>

        Bairro<br>
        <input type="text" name="bairro" value="<?= htmlspecialchars($cliente->getBairro(), ENT_QUOTES, 'UTF-8') ?>"><br><br>

        Rua<br>
        <input type="text" name="rua" value="<?= htmlspecialchars($cliente->getRua(), ENT_QUOTES, 'UTF-8') ?>"><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
