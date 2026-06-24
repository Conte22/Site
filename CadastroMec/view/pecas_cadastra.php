<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../controller/PecaController.php';
    (new PecaController())->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Peca</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Cadastrar Peca</h2>
    <form action="" method="POST">
        Nome da Peca *<br>
        <input type="text" name="nome" style="width: 100%;" required><br><br>

        Preco *<br>
        <input type="text" name="preco_venda" style="width: 100%;" required><br><br>

        Estoque *<br>
        <input type="number" name="estoque" style="width: 100%;" required><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
