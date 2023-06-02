<?php
if (isset($_POST)) {
    if (!empty($_POST['nome']) and !empty($_POST['empresa']) and !empty($_POST['ano'])) {
        //Linka o BD
        $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
        //CONCTAR NO IF
        // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
        //Pega as variaveis do form
        $ano = $_POST["ano"];
        $nome = $_POST["nome"];
        $empresa = $_POST["empresa"];
        // header('location: master.php');
        $sql = "INSERT INTO sistemas (nome,ano,empresa) VALUES ('".$nome."','".$ano."','".$empresa."');";
        mysqli_query($connect, $sql);
        header('Location: paginaSistema.php');
    };
};
?>