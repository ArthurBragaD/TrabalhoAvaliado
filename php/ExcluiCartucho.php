<?php 
if (isset($_POST)) {
//Linka o BD
$connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
//CONCTAR NO IF
// $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
session_start();
$id=$_POST["id"];
$busca=$_POST["busca"];
$filtro=$_POST["filtro"];
$escolhaPesquisa = $_POST["escolhaPesquisa"];
if ($_POST["fazer"]==="excluir") {
    $sqlcartucho = "SELECT * FROM cartucho WHERE id = ".$id.";";
    $cartucho = mysqli_query($connect, $sqlcartucho);
    $cartucho=mysqli_fetch_array($cartucho, MYSQLI_ASSOC);
    $sqladd = "INSERT INTO deletados(id,qex,nome,sistema,usuario,ano,data) VALUES (".$cartucho['id'].",".$_SESSION["cpf"].",'".$cartucho['nome']."','".$cartucho['sistema']."',".$cartucho['usuario'].",".$cartucho['ano'].",'".date('Y-m-d')."')";
    echo $sqladd;
    mysqli_query($connect, $sqladd);
    $sql="DELETE FROM cartucho WHERE id ='".$id."'";
    mysqli_query($connect, $sql);
    header("Location:paginaSistema.php?");
};
};

?>