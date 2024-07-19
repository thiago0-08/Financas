<?php

if(isset($_POST['enviar'])){

    include_once('config.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "SELECT * FROM financas WHERE email='$email' AND senha='$senha'");

     if(mysqli_num_rows($result) > 0)
     {
       header('Location: telamenu.php');
     }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets_css/telalogincss.css">
</head>
<body>
    <div class="container">
        <section class="section--1">
            <img class="foto-left" src="img/ilustrator.svg">
        </section>

        <section class="section--2">
            <h1>Login</h1>
            <main class="main--login">
                <form action="#" method="POST">
                    <fieldset class="formulario--dados">
                        <div>
                            <p>
                                <label>Email</label>
                                <article class="inputsdados">
                                    <input type="email" name="email" required>
                                </article>
                            </p>
                        </div>

                        <div>
                            <p>
                                <label>Senha</label>
                                <article class="inputsdados">
                                    <input type="password" name="senha" required>
                                </article>
                            </p>
                        </div>

                        <article class="btn">
                            <input type="submit" name="enviar" value="Enviar">
                        </article>

                        <section class="linhaseparar">
                            <article class="linha1">
                                <hr>
                            </article>
    
    
                            <article>
                                <p>Ou</p>
                            </article>
    
    
                            <article class="linha2">
                                <hr>
                            </article>
                        </section>
                    </fieldset>
                </form>


                <footer class="footer--dados">
                    <nav class="links">
                        <a href="telacadastro.php">Cadastrar-se</a>
                        <article>
                            <a href="#">Forgot login or password ?</a>
                        </article>
                    </nav>
                </footer>


            </main>
        </section>
    </div>
</body>
</html>