<?php

require_once __DIR__ . '/../controller/MecanicoController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    (new MecanicoController())->deletar();
}

header('Location: mecanicos_lista.php');
exit;
