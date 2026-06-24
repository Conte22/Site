<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Oficina</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .panel-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 450px;
        }

        h2 {
            color: #333333;
            margin-bottom: 10px;
        }

        hr {
            border: 0;
            height: 1px;
            background-color: #e0e0e0;
            margin-bottom: 25px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 15px;
        }

        a {
            display: block;
            text-decoration: none;
            color: #4a5568; 
            font-weight: 500;
            padding: 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background-color: #ffffff;
            cursor: pointer; 
            transition: color 0.2s ease-in-out, border-color 0.2s ease-in-out;
        }

        
        a:hover {
            color: #000000;
            border-color: #a0aec0; 
            background-color: #ffffff; 
        }
    </style>
</head>
<body>

    <div class="panel-container">
        <h2>Painel da Oficina</h2>
        <hr>
        <ul>
            <li><a href="clientes_lista.php">Cadastro de Clientes</a></li>
            <li><a href="lista.php">Ordens de Serviço</a></li>
            <li><a href="mecanicos_lista.php">Controle de Mecânicos</a></li>
            <li><a href="pecas_lista.php">Estoque de Peças</a></li>
            <li><a href="feedbacks_mural.php">Mural de Feedbacks</a></li>
        </ul>
    </div>

</body>
</html>