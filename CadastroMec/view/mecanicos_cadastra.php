<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../controller/MecanicoController.php';
    (new MecanicoController())->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Mecanico</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Cadastrar Mecanico</h2>
    <form action="" method="POST">
        Nome *<br>
        <input type="text" name="nome" style="width: 100%;" required><br><br>

        Especialidade *<br>
        <input type="text" name="especialidade" style="width: 100%;" required><br><br>

        Telefone *<br>
        <input type="text" name="telefone" style="width: 100%;" required><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
