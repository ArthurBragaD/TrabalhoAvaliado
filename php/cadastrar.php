<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastrar</title>
</head>

<body>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">CADASTRO</h2>
    </div>
    <div class="box">
    <form action="./cadastro.php" method="post">
            <?php
                // Notifica ao usuario o erro 
                if (isset($_GET["erro"])) {
                    echo "Um dos campos está vazio";
                };
            ?>
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">CPF:</label>
                <input type="text" name="cpf" maxlength="11" minlength="11"><br>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Nome:</label>
                <input type="text" name="nome"><br>
            </div>
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Senha:</label>
                <input type="text" name="senha"><br>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Email:</label>
                <input type="text" name="email"><br>
            </div>
            <button type="submit" class="btn btn-primary button">Submit</button>
        </form>
        <div class="text-center">
                <p><a href='./login.php'>Voltar para o login</a></p>
        </div>
    </div>
</body>

</html>