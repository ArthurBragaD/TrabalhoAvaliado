<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prototipo do Css Site Prefeitura | Login</title>
    <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/js/bootstrap.min.css" media="screen"> -->
    <link rel="stylesheet" href="/css/Reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <script type="text/javascript">
        function ajusta_texto(h) {
            h.style.height = "20px";
            h.style.height = (h.scrollHeight) + "px";
        }
    </script>
    <?php
    $id = $_POST["id"];
    $erro = 0;
    // Modificar Conta
    if (isset($_POST["atualizar"])) {
        if (!empty($_POST['nome']) and !empty($_POST['ano']) and !empty($_POST['empresa'])) {
            //Linka o BD
            $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
            //CONCTAR NO IF
            // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
            $nome = $_POST['nome'];
            $empresa = $_POST['empresa'];
            $ano = $_POST['ano'];
            $id =  $_POST["id"];
            $sql = "UPDATE sistemas SET nome = '" . $nome . "', empresa = '" . $empresa . "', ano='" . $ano . "' WHERE id=" . $id . ";";
            $alterar = mysqli_query($connect, $sql);
            header('Location: paginaSistema.php');
        } else {
            $id = $_POST["id"];
            $erro = 1;
            //Linka o BD
            $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
            //CONCTAR NO IF
            // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
            $sql = "SELECT * FROM sistemas WHERE id =" . $id;
            $alterar = mysqli_query($connect, $sql);
            $dados = mysqli_fetch_array($alterar, MYSQLI_ASSOC);
        };
    } else {
        if ($_POST["fazer"] === "modificar") {
            $id = $_POST["id"];
            //Linka o BD
            $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
            //CONCTAR NO IF
            // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
            $sql = "SELECT * FROM sistemas WHERE id =" . $id;
            $alterar = mysqli_query($connect, $sql);
            $dados = mysqli_fetch_array($alterar, MYSQLI_ASSOC);
        };
    };
    ?>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Modificar Sistema</h2>
    </div>
    <div class="artigo_texto">
        <form action="" method="post" class="form-container">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <ul>
                <?php if ($erro == 1) {
                    echo '<p class="alert alert-danger">Título do sistema, Empresa ou Ano vazios </p> ';
                } ?>
                <li>
                    <label for="Nome">Título do sistema</label>
                    <textarea onkeyup="ajusta_texto(this)" name="nome" value="<?php echo $dados["nome"]; ?>"><?php echo $dados["nome"]; ?></textarea>
                    <span>Coloque o nome do sistema</span>
                </li>
                <li>
                    <label for=" Empresa">Empresa</label>
                    <textarea onkeyup="ajusta_texto(this)" name="empresa" value="<?php echo $dados["empresa"]; ?>"><?php echo $dados["empresa"]; ?></textarea>
                    <span>Coloque a empresa do sistema</span>
                </li>
                <li>
                    <label for="Ano">Ano de lançamento</label>
                    <textarea onkeyup="ajusta_texto(this)" name="ano" value="<?php echo $dados["ano"]; ?>"><?php echo $dados["ano"]; ?></textarea>
                    <span>Coloque o ano de lançamento do Sistema</span>
                </li>
                <button type="submit" class="btn btn-primary" name="atualizar">Alterar</button>
                </li>
            </ul>
        </form>
    </div>

    <form action="./paginaSistema.php">
        <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
    </form>
</body>

</html>