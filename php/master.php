<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Cartuchos Master</title>
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
    <link rel="stylesheet" href=".../resource/css/master.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>  
    <script type="text/javascript">
        function ajusta_texto(h) {
            h.style.height = "20px";
            h.style.height = (h.scrollHeight) + "px";
        }
    </script>
    <div class="titulo-container">
        <h2 class="titulo-conteudo">Master Page</h2>
    </div>
    <?php
    session_start();
    include '../include/erroAdicionarCartucho.php';
    ?>
    <div class="master-container">
        <section class="master-table" role="tablist">
            <div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a data-toggle="collapse" href="#AdicionarCartucho" role="tab" <?php if ($erro == 1) {
                                                                                            echo 'class="" aria-expanded="true"';
                                                                                        } else {
                                                                                            echo 'class="collapsed"';
                                                                                        } ?>>
                            ADICIONAR CARTUCHO
                        </a>
                    </h4>
                </div>
                <div id="AdicionarCartucho" <?php if ($erro == 1) {
                                                echo 'class="collapse show" role="tabpanel" style=""';
                                            } else {
                                                echo 'class="collapse" role="tabpanel" style="height: 0px;"';
                                            } ?>>
                    <div class="painel-body">
                        <div class="artigo_texto">
                            <form action="./adicionarCartucho.php" method="post" class="form-container" enctype="multipart/form-data">
                            <?php if ($erro == 1) {
                                                echo '<p class="alert alert-danger">Título, Sistema ou Ano vazio </p> ';
                                            } ?>   
                            <ul>
                                    <li>
                                        <label for="nome">Título do Jogo</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="nome" value="<?php echo $nome; ?>"><?php echo $nome; ?></textarea>
                                        <span>Coloque o Título do Cartucho</span>
                                    </li>
                                    <li>
                                        <label for="sistema">Sistema</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="sistema" value="<?php echo $sistema; ?>"><?php echo $sistema; ?></textarea>
                                        <span>Coloque o Sistema do Jogo</span>
                                    </li>
                                    <li>
                                        <label for="ano">Ano de lançamento</label>
                                        <textarea onkeyup="ajusta_texto(this)" name="ano" value="<?php echo $ano; ?>"><?php echo $ano; ?></textarea>
                                        <span>Coloque o ano de lançamento do cartucho</span>
                                    </li>
                                    <li>
                                        <label for="imagem">Tela</label>
                                        <input type="file" name="imagem">
                                        <span>Escolha o arquivo de imagem apenas permitidos (png, jpeg, jpg)</span>
                                    </li>
                                    <li>
                                        <button type="submit" class="btn btn-primary" name="enviarcartucho">Enviar</button>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="./MudaNoticia.php" class="collapsed">
                            MODIFICAR ADM
                        </a>
                    </h4>
                </div> -->
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="VerMeusCartuchos.php" class="collapsed">
                            VER MEUS CARTUCHOS
                        </a>
                    </h4>
                </div>
                <!-- <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="" class="collapsed">
                            MODIFICAR | EXCLUIR CONTA
                        </a>
                    </h4>
                </div> -->
            </div>
            <?php
            if ($_SESSION["tipo"] === "adm") :
            ?>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="pesquisaCartucho.php" class="collapsed">
                            PESQUISAR CARTUCHO | JOGO PARA SISTEMA
                        </a>
                    </h4>
                </div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="paginaSistema.php" class="collapsed">
                            MODIFICA | INSERE SISTEMAS
                        </a>
                    </h4>
                </div>
                <div class="painel-heading">
                    <h4 class="painel-title Menu-titulo">
                        <a href="historicoExclusao.php" class="collapsed">
                            VER HISTÓRICO DE EXCLUSÃO
                        </a>
                    </h4>
                </div>
            <?php endif; ?>
        </section>
    </div>


    <a href="logout.php" style="text-decoration: none; color: white;"><button type="submit" class="btn btn-primary Logout-button">Logout</button></a>
</body>

</html>