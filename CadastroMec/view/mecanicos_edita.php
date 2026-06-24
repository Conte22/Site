<?php
require_once __DIR__ . '/../controller/MecanicoController.php';

$mecanicoController = new MecanicoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mecanicoController->atualizar();
}

$mecanico = $mecanicoController->buscarPorId($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Mec&acirc;nico</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Editar Mec&acirc;nico</h2>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $mecanico->getId() ?>">

        Nome *<br>
        <input type="text" name="nome" value="<?= htmlspecialchars($mecanico->getNome(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Especialidade *<br>
        <input type="text" name="especialidade" value="<?= htmlspecialchars($mecanico->getEspecialidade(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        Telefone *<br>
        <input type="text" name="telefone" value="<?= htmlspecialchars($mecanico->getTelefone(), ENT_QUOTES, 'UTF-8') ?>" required><br><br>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
