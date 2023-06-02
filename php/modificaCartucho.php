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
    $busca = $_POST["busca"];
    $filtro=$_POST["filtro"];
    $escolhaPesquisa = $_POST["escolhaPesquisa"];
    $id = $_POST["id"];
    // Modificar Conta
    if (isset($_POST["atualizar"])) {
        if (!empty($_POST['nome']) and !empty($_POST['sistema']) and !empty($_POST['ano'])) {
            //Linka o BD
            $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
            //CONCTAR NO IF
            // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
            $nome = $_POST['nome'];
            $sistema = $_POST['sistema'];
            $ano = $_POST['ano'];
            $id =  $_POST["id"];
            if ($_FILES["imagem"]["size"] != 0) {
                $file_name = $_FILES['imagem']['name'];
                $file_temp = $_FILES['imagem']['tmp_name'];
                $exp = explode(".", $file_name);
                $ext = end($exp);
                $imagem = time() . "." . $ext;
                $ext_allowed = array("png", "jpeg", "jpg");
                $localizado = "../upload/" . $imagem;
                if (in_array($ext, $ext_allowed)) {
                    if (move_uploaded_file($file_temp, $localizado)) {
                        $sql = "UPDATE cartucho SET nome = '" . $nome . "', sistema = '" . $sistema . "', ano='" . $ano . "', tela  = '" . $imagem . "', localizado = '" . $localizado . "' WHERE id=" . $id .";";
                        mysqli_query($connect, $sql);
                        header('Location: pesquisaCartucho.php?buscaCartucho=' . $busca."&filtro=".$filtro."&escolhaPesquisa=".$escolhaPesquisa);
                    };
                } else {
                    $dados["nome"] = $_POST['nome'];
                    $dados["sistema"] = $_POST['sistema'];
                    $dados["ano"] = $_POST['ano'];
                    unset($_FILES["imagem"]);
                    echo "Formato de arquivo de imagem inválido";
                };
            } else {
                $sql = "UPDATE cartucho SET nome = '" . $nome . "', sistema = '" . $sistema . "', ano='" . $ano . "' WHERE id=" . $id .";";
                mysqli_query($connect, $sql);
                header('Location: pesquisaCartucho.php?buscaCartucho=' . $busca."&filtro=".$filtro."&escolhaPesquisa=".$escolhaPesquisa);
            }
        } else {
            echo "Nome, sistema e ano do cartucho não podem estar vazios";
            $dados["nome"] = $_POST['nome'];
            $dados["sistema"] = $_POST['sistema'];
            $dados["ano"] = $_POST['ano'];
            unset($_FILES["imagem"]);
        };
    } else {
        if ($_POST["fazer"] === "modificar") {
            $id = $_POST["id"];
            //Linka o BD
            $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
            //CONCTAR NO IF
            // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
            $sql = "SELECT * FROM cartucho WHERE id =" . $id;
            $alterar = mysqli_query($connect, $sql);
            $dados = mysqli_fetch_array($alterar, MYSQLI_ASSOC);
        };
    };
    ?>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Modificar Cartucho</h2>
    </div>
    <div class="artigo_texto">
        <form action="" method="post" class="form-container" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="hidden" name="busca" value="<?php echo $busca ?>">
            <input type="hidden" name="escolhaPesquisa" value="<?php echo $escolhaPesquisa?>">
            <input type="hidden" name="filtro" value="<?php echo $filtro?>">
            <ul>
                <li>
                    <label for="nome">Título do jogo</label>
                    <textarea onkeyup="ajusta_texto(this)" name="nome" value="<?php echo $dados["nome"]; ?>"><?php echo $dados["nome"]; ?></textarea>
                    <span>Coloque o nome do cartucho</span>
                </li>
                <li>
                    <label for="sistema">Sistema</label>
                    <textarea onkeyup="ajusta_texto(this)" name="sistema" value="<?php echo $dados["sistema"]; ?>"><?php echo $dados["sistema"]; ?></textarea>
                    <span>Coloque o sistema do Jogo</span>
                </li>
                <li>
                    <label for="ano">Ano de lançamento</label>
                    <textarea onkeyup="ajusta_texto(this)" name="ano" value="<?php echo $dados["ano"]; ?>"><?php echo $dados["ano"]; ?></textarea>
                    <span>Coloque o ano de lançamento do Jogo</span>
                </li>
                <li>
                    <label for="imagem">Tela</label>
                    <input type="file" name="imagem" value="">
                    <span>Escolha o arquivo de imagem apenas permitidos (png, jpeg, jpg)</span>
                <li>
                    <button type="submit" class="btn btn-primary" name="atualizar">Alterar</button>
                </li>
            </ul>
        </form>
    </div>
   
    <form action="./pesquisaCartucho.php">
            <input type="hidden" name="buscaCartucho" value="<?php echo $busca?>">
            <input type="hidden" name="escolhaPesquisa" value="<?php echo $escolhaPesquisa?>">
            <input type="hidden" name="filtro" value="<?php echo $filtro?>">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
</body>

</html>