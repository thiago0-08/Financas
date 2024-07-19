<?php
include_once('config.php');


$con = new Database();
$conexao = $con->getConexao(); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $data_nasc = isset($_POST['data_nasc']) ? $_POST['data_nasc'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';

 
    $stmt = $conexao->prepare("INSERT INTO usuarios (nome, email, telefone, sexo, data_nasc, cidade, estado, endereco) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $result = $stmt->execute([$nome, $email, $telefone, $sexo, $data_nasc, $cidade, $estado, $endereco]);

    if ($result) {
        header("Location: telamenu.php");
        exit(); 
    } else {
        echo "Erro ao cadastrar: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-item {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="navbar">
       <a href="login.php" style="float: right;">Sair</a>
   </div>
    <div class="form-container">
        <h1>Cadastro de Usuário</h1>
        <form method="POST" action="">
            <div class="form-item">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-item">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-item">
                <label for="telefone">Telefone:</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <div class="form-item">
                <label for="sexo">Gênero:</label>
                <select id="sexo" name="sexo" required>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>
            </div>
            <div class="form-item">
                <label for="data_nasc">Data de Nascimento:</label>
                <input type="date" id="data_nasc" name="data_nasc" required>
            </div>
            <div class="form-item">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade" required>
            </div>
            <div class="form-item">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required>
            </div>
            <div class="form-item">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco" required>
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</body>
</html>
