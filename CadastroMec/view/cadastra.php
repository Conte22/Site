<?php
require_once __DIR__ . '/../controller/OrdemServicoController.php';
require_once __DIR__ . '/../controller/ClienteController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (new OrdemServicoController())->salvar();
}

$clientes = (new ClienteController())->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Nova Ordem de Servi&ccedil;o</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Abrir Ordem de Servi&ccedil;o</h2>
    <form action="" method="POST">
        Ve&iacute;culo *<br>
        <input type="text" name="veiculo" style="width: 100%;" required><br><br>

        Ano *<br>
        <input type="text" name="ano" style="width: 100%;" required><br><br>

        Defeito *<br>
        <textarea name="defeito" style="width: 100%;" required></textarea><br><br>

        Pre&ccedil;o *<br>
        <input type="text" name="preco" style="width: 100%;" required><br><br>

        Cliente Propriet&aacute;rio<br>
        <select name="cliente_id" style="width: 100%;">
            <option value="">-- Selecione --</option>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente->getId() ?>"><?= htmlspecialchars($cliente->getNome(), ENT_QUOTES, 'UTF-8') ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
