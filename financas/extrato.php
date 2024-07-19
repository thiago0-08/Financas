<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrato de Finanças</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .navbar {
            background-color: #007bff;
            overflow: hidden;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar a:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .navbar a.logout {
            float: right;
        }

        .profile-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .info-item {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            margin: 20px 0;
            font-size: 16px;
        }

        .message a {
            color: #007bff;
            text-decoration: none;
        }

        .message a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="telamenu.php">Menu</a>
        <a href="login.php" class="logout">Sair</a>
    </div>

    <h1>Extrato de Finanças</h1>

    <div class="profile-container">
        <?php
      
        ?>

        <?php
      
        $saldoInicial = 0;

      
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
           
            if (isset($_POST["saldoInicial"])) {
             
                $saldoInicial = $_POST["saldoInicial"];

              
                if (is_numeric($saldoInicial) && $saldoInicial >= 0) {
                   
                    if (isset($_POST["valorCompra"])) {
                       
                        $valorCompra = $_POST["valorCompra"];

                        
                        if (is_numeric($valorCompra) && $valorCompra >= 0) {
                            // Atualiza o saldo
                            $saldoInicial -= $valorCompra;

                       
                            echo "<div class='message'>Compra no valor de R$ " . number_format($valorCompra, 2, ',', '.') . " realizada. Saldo atual: R$ " . number_format($saldoInicial, 2, ',', '.') . "</div>";

                        
                            if ($saldoInicial >= 0) {
                                echo "<div class='message'>Quer aprender a investir seu dinheiro? <a href='https://www.tesourodireto.com.br/'>Clique Aqui</a></div>";
                            } else {
                                echo "<div class='message'>Aprenda a gerenciar seu dinheiro. <a href='https://www.contabilizei.com.br/contabilidade-online/9-dicas-para-organizar-suas-financas-pessoais/'>Clique Aqui</a></div>";
                            }
                        } else {
                            echo "<div class='message'>Por favor, insira um valor de compra não negativo.</div>";
                        }
                    } else {
                        echo "<div class='message'>O valor da compra não foi fornecido.</div>";
                    }
                } else {
                    echo "<div class='message'>Por favor, insira um saldo inicial válido.</div>";
                }
            } else {
                echo "<div class='message'>O saldo inicial não foi fornecido.</div>";
            }
        }
        ?>

      
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="saldoInicial">Informe o saldo inicial:</label>
            <input type="text" name="saldoInicial" id="saldoInicial" required>
            <br>
            <label for="valorCompra">Informe o valor da compra:</label>
            <input type="text" name="valorCompra" id="valorCompra" required>
            <br>
            <button type="submit">Registrar Compra</button>
        </form>
    </div>
</body>

</html>
