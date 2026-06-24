<?php
require_once __DIR__ . '/../controller/FeedbackController.php';

$feedbackController = new FeedbackController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedbackController->salvar();
}

$comentarios = $feedbackController->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mural</title>
</head>
<body style="font-family: sans-serif; max-width: 500px; margin: 30px auto;">
    <h2>Mural de Depoimentos (MockAPI)</h2>
    <form action="" method="POST" style="border: 1px solid #ccc; padding: 15px; border-radius: 5px;">
        Nome *<br>
        <input type="text" name="nome" style="width: 95%;" required><br><br>

        Mensagem *<br>
        <textarea name="feedback" style="width: 95%; height: 60px;" required></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
    <hr>
    <h3>Historico</h3>
    <?php foreach (array_reverse($comentarios) as $item): ?>
        <div style="background: #f9f9f9; border-left: 4px solid #007bff; margin-bottom: 10px; padding: 10px;">
            <strong><?= htmlspecialchars($item['nome'] ?? 'Anonimo', ENT_QUOTES, 'UTF-8') ?></strong>
            <p style="margin: 5px 0 0 0;">"<?= htmlspecialchars($item['feedback'] ?? '', ENT_QUOTES, 'UTF-8') ?>"</p>
        </div>
    <?php endforeach; ?>
    <br>
    <a href="index.php">Menu</a>
</body>
</html>
