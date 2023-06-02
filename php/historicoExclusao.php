<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa Cartucho</title>
    <!-- <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/js/bootstrap.min.css" media="screen"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/pesquisa.css">
    <link rel="stylesheet" href="../css/master.css">
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
    if (isset($_GET)) {
        if (isset($_GET["buscaCartucho"])) {
            $buscaCartucho = $_GET["buscaCartucho"];
            $filtro = $_GET['filtro'];
            $escolhaPesquisa = $_GET["escolhaPesquisa"];
        } else {
            $buscaCartucho = '';
            $filtro = 'DESC';
            $escolhaPesquisa = 'nome';
        }
        //Linka o BD
        $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
        //CONCTAR NO IF
        // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
        $sql = "SELECT DISTINCT * FROM deletados WHERE " . $escolhaPesquisa . " LIKE '%" . $buscaCartucho . "%' ORDER BY ano " . $filtro . ";";
        $contando = mysqli_query($connect, $sql);
        $Cartucho = mysqli_query($connect, $sql);
        $num = 0;
        while ($conta = mysqli_fetch_array($contando, MYSQLI_ASSOC)) {
            ++$num;
        };
    } else {
        $num = 0;
    };
    ?>

    <div class="titulo-container">
        <h2 class="titulo-conteudo">Excluidos</h2>
    </div>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 30%;">Nome</th>
                    <th style="width: 20%;">Sistema</th>
                    <th style="width: 5%;">Ano</th>
                    <th style="width: 5%;">Usuario</th>
                    <th style="width: 20%;">Data de deleção</th>
                    <th style="width: 20%;">Quem excluiu</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($dados = mysqli_fetch_array($Cartucho, MYSQLI_ASSOC)) : ?>
                    <tr>
                        <td><?php echo $dados["nome"]; ?></td>
                        <td><?php echo $dados["sistema"]; ?></td>
                        <td><?php echo $dados["ano"]; ?></td>
                        <td><?php
                            $buscaNome = "SELECT (nome) FROM login WHERE cpf=" . $dados["usuario"] . ";";
                            $pesquisa = mysqli_query($connect, $buscaNome);
                            $nome = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC);
                            echo $nome['nome'];
                            ?></td>
                            <td><?php echo $dados["data"]; ?></td>
                            <td><?php $buscaNome = "SELECT (nome) FROM login WHERE cpf=" . $dados["qex"] . ";";
                            $pesquisa = mysqli_query($connect, $buscaNome);
                            $nome = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC);
                            echo $nome['nome'];; ?></td>
                        <!-- <td>
                            <form method="post" action="./modificaCartucho.php">
                                <input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
                                <input type="hidden" name="busca" value="<?php echo $buscaCartucho; ?>">
                                <button type="submit" name="fazer" value="modificar" class="botao-modifica rounded-circle bi bi-pencil-fill"></button>
                            </form>
                        </td> -->
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <div>
        <form action="./gerarPdfHE.php">
            <button type="submit" lass="btn btn-primary voltarbutton">Relatorio</button>
        </form>
    </div>
    <div>
        <form action="./master.php">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
    </div>
</body>

</html>