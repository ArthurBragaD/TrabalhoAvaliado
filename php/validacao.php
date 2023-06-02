<?php
// Checa se existe um submit
if (isset($_POST)) {
    //Pega as variaveis do form
    $usuario = $_POST["usuario"];   
    $senha = $_POST["senha"];
    //Linka o BD
    $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
    //CONECTAR NO IF
    // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
    //String do contato com o BD
    $pesquisa = "SELECT * FROM login WHERE nome = '".$usuario."' OR email = '".$usuario."';";
    //Contato com o BD
    $resultado = mysqli_query($connect, $pesquisa);
    //Aderindo o resultado do query em uma $variavel 
    $dados = mysqli_fetch_array($resultado, MYSQLI_ASSOC);
    //Validação da senha
    if (password_verify($senha, $dados["senha"])) {
        //Sucesso da validação envia para o master.php
        session_start();
        $_SESSION["tipo"] = $dados["tipo"];
        $_SESSION["cpf"] = $dados["CPF"];
        header('Location: master.php');
    } else {
        echo "teste";
        //Erro de validação envia para o login.php com um dado de erro 
        header('Location: login.php?erro=1');
    };
};
?>
