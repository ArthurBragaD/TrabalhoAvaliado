<?php
if (isset($_GET['erro'])) {
    $erro = 1;
} else{
    $erro = 0;
    $nome = '';
    $ano = '';
    $sistema = '';
};
if ($erro == 1) {
    $nome = $_GET['nome'];
    $ano = $_GET['ano'];
    $sistema = $_GET['sistema'];
};
?>