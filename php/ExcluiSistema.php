<?php 
//Linka o BD
$connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
//CONCTAR NO IF
// $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
$id=$_POST["id"];
if ($_POST["fazer"]==="excluir") {
    $sql="DELETE FROM sistemas WHERE id ='".$id."'";
    echo $sql;
    mysqli_query($connect, $sql);
    header("Location:paginaSistema.php");
};

