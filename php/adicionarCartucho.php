<?php

if (isset($_POST)) {
    if (!empty($_POST['nome']) and !empty($_POST['sistema']) and !empty($_POST['ano'])) {
        //Linka o BD
        $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
        //CONCTAR NO IF
        // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");

        //Pega as variaveis do form
        $ano = $_POST["ano"];
        $nome = $_POST["nome"];
        $sistema = $_POST["sistema"];
        //Começa a session e pega o cpf do usuário
        session_start();
        $cpf = $_SESSION["cpf"] ;  
        //Chegar se a imagem possui tamanho maior que zero 
        if ($_FILES["imagem"]["size"]!=0) {
            $file_name = $_FILES['imagem']['name'];
            $file_temp = $_FILES['imagem']['tmp_name'];
            //pegar a extenção do nome do arquivo
            $exp = explode(".", $file_name);
            $ext = end($exp);
            $imagem = time() . "." . $ext;
            //testando se a imagem é de um formato permitido 
            $ext_allowed = array("png", "jpeg", "jpg");
            //upload da imagem
            $localizado = "../upload/" . $imagem;
                if (in_array($ext, $ext_allowed)) {
                    if (move_uploaded_file($file_temp, $localizado)) {
                        $sql = "INSERT INTO cartucho (nome,sistema,ano,tela,localizado,usuario) VALUES ('".$nome."','".$sistema."','".$ano."','".$imagem."','".$localizado."','".$cpf."');";
                        mysqli_query($connect, $sql);
                        $ano = "";
                        $nome = "";
                        $sistema = "";
                unset($_FILES["imagem"]);
                header('location: master.php');
                    }
                }else{
                    $ano = $_POST["ano"];
                    $nome = $_POST["nome"];
                    $sistema = $_POST["sistema"];
            unset($_FILES["imagem"]);
            // header('location: master.php');
                };
    }else {
        $sql = "INSERT INTO cartucho (nome,sistema,ano,usuario) VALUES ('".$nome."','".$sistema."','".$ano."','".$cpf."');";
        mysqli_query($connect, $sql);
        header('location: master.php');
    };
    }else{
        $ano = $_POST["ano"];
        $nome = $_POST["nome"];
        $sistema = $_POST["sistema"];
        header('location: master.php?nome='.$nome.'&ano='.$ano.'&sistema='.$sistema.'&erro=1');
    };
};
?>