<?php
include_once('config.php');


$con = new Database();
$link = $con->getConexao();


$stmt = $link->prepare("SELECT * FROM usuarios ORDER BY id DESC LIMIT 1");
$stmt->execute();


$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #444;
            margin: 20px 0;
        }

        .navbar {
            background-color: #007bff;
            overflow: hidden;
            padding: 10px 20px;
        }

        .navbar a {
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #0056b3;
            color: white;
        }

        .navbar .logout {
            float: right;
        }

        .profile-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .info-item {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            color: #333;
            margin-bottom: 5px;
        }

        span {
            display: block;
            color: #666;
            font-size: 16px;
        }

        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="telamenu.php">Menu</a>
        <a href="login.php" class="logout">Sair</a>
    </div>

    <div class="center">
        <h1>Informações do Usuário</h1>
    </div>
    
    <?php
    if ($data) {
    ?>
        <div class="profile-container">
            <div class="info-item">
                <label>Nome:</label>
                <span><?php echo htmlspecialchars($data['nome']); ?></span>
            </div>

            <div class="info-item">
                <label>Email:</label>
                <span><?php echo htmlspecialchars($data['email']); ?></span>
            </div>

            <div class="info-item">
                <label>Telefone:</label>
                <span><?php echo htmlspecialchars($data['telefone']); ?></span>
            </div>

            <div class="info-item">
                <label>Gênero:</label>
                <span><?php echo htmlspecialchars($data['sexo']); ?></span>
            </div>

            <div class="info-item">
                <label>Data de Nascimento:</label>
                <span><?php echo htmlspecialchars($data['data_nasc']); ?></span>
            </div>

            <div class="info-item">
                <label>Cidade:</label>
                <span><?php echo htmlspecialchars($data['cidade']); ?></span>
            </div>

            <div class="info-item">
                <label>Estado:</label>
                <span><?php echo htmlspecialchars($data['estado']); ?></span>
            </div>

            <div class="info-item">
                <label>Endereço:</label>
                <span><?php echo htmlspecialchars($data['endereco']); ?></span>
            </div>
        </div>
    <?php
    } else {
        echo "<div class='center'><p>Nenhuma informação disponível.</p></div>";
    }
    ?>
</body>
</html>
