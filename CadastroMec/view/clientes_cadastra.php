<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../controller/ClienteController.php';
    (new ClienteController())->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Novo Cliente</title>
    <script>
        function buscarCep() {
            const cep = document.getElementById('cep').value.replace(/\D/g, '');

            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then((res) => res.json())
                    .then((dados) => {
                        if (!dados.erro) {
                            document.getElementById('cidade').value = dados.localidade;
                            document.getElementById('bairro').value = dados.bairro;
                            document.getElementById('rua').value = dados.logradouro;
                        }
                    });
            }
        }
    </script>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 30px auto;">
    <h2>Cadastro de Cliente</h2>
    <form action="" method="POST">
        Nome *<br>
        <input type="text" name="nome" style="width: 100%;" required><br><br>

        CEP *<br>
        <input type="text" id="cep" name="cep" onblur="buscarCep()" style="width: 100%;" required><br><br>

        Cidade<br>
        <input type="text" id="cidade" name="cidade" style="width: 100%;"><br><br>

        Bairro<br>
        <input type="text" id="bairro" name="bairro" style="width: 100%;"><br><br>

        Rua<br>
        <input type="text" id="rua" name="rua" style="width: 100%;"><br><br>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>
