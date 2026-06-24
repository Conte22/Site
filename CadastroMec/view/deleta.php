<?php

require_once __DIR__ . '/../controller/OrdemServicoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (new OrdemServicoController())->deletar();
}

header('Location: lista.php');
exit;
