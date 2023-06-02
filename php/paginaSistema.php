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
        //Linka o BD
        $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
        //CONCTAR NO IF
        // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");

        $sql = "SELECT DISTINCT * FROM sistemas ORDER BY ano ASC;";
        $Sistema = mysqli_query($connect, $sql);
    ?>
    <div class="artigo_texto">
        <form action="adicionarSistema.php" method="post" class="form-container" enctype="multipart/form-data">
            <ul>
                <li>
                    <label for="nome">Nome do sistema</label>
                    <textarea onkeyup="ajusta_texto(this)" name="nome"></textarea>
                    <span>Coloque o nome do sistema</span>
                </li>
                <li>
                    <label for="ano">Ano de lançamento</label>
                    <textarea onkeyup="ajusta_texto(this)" name="ano"></textarea>
                    <span>Coloque o ano de lançamento do cartucho</span>
                </li>
                <li>
                    <label for="empresa">Empresa</label>
                    <textarea onkeyup="ajusta_texto(this)" name="empresa"></textarea>
                    <span>Coloque a Empresa do Jogo</span>
                </li>
                <li>
                    <button type="submit" class="btn btn-primary" name="enviarcartucho">Enviar</button>
                </li>
            </ul>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th style="width: 30%;">Nome</th>
                <th style="width: 20%;">Ano</th>
                <th style="width: 20%;">Empresa</th>
                <th style="width: 10%;" colspan="2"> Botões</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($dados = mysqli_fetch_array($Sistema, MYSQLI_ASSOC)) : ?>
                <tr>
                    <td><?php echo $dados["nome"]; ?></td>
                    <td><?php echo $dados["ano"]; ?></td>
                    <td><?php echo $dados["empresa"]; ?></td>
                    <td>
                        <form method="post" action="./modificaSistema.php">
                            <input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
                            <button type="submit" name="fazer" value="modificar" class="botao-modifica rounded-circle bi bi-pencil-fill"></button>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="./ExcluiSistema.php">
                            <input type="hidden" name="id" value="<?php echo $dados["id"]; ?>">
                            <button type="submit" name="fazer" value="excluir" class="botao-deleta rounded-circle bi bi-trash-fill"></button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
    <div>
        <form action="./master.php">
            <button type="submit" class="btn btn-primary voltarbutton">Voltar</button>
        </form>
    </div>
</body>

</html>