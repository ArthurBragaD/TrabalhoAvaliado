<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="box">
        <form action="./validacao.php" method="post">
            <?php
            // Validação vinda do cadastro.php para mostrar ao usuario que sua conta foi cadastrada
            if (isset($_GET["cadastro"])) {
                echo "<p>Cadastro feito com sucesso.</p>";
            };
            // Validação vinda da validacao.php para mostrar ao usuario que alguma parte do seu login está incorreta
            if (isset($_GET["erro"])) {
                echo "<p>Login Inválido</p>";
            };
            // Logout vindo do logout.php para mostrar ao usuário que o lkogout foi efetuado
            if (isset($_GET["logout"])) {
                echo "<p>Logout Efetuado</p>";
            };
            ?>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email ou Nome:</label>
                <input type="text" name="usuario" class="form-control"/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Senha:</label>
                <input type="password" name="senha" class="form-control"/>
            </div>

            <!-- Submit button -->
            <button id="submit" type="submit" class="btn btn-primary btn-block mb-4">Login</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p><a href='./cadastrar.php'>Se Cadastre</a></p>
            </div>
        </form>
    </div>
</body>

</html>