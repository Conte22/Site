<?php

require_once __DIR__ . '/../controller/PecaController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (new PecaController())->deletar();
}

header('Location: pecas_lista.php');
exit;
