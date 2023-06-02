<?php
require('../fpdf/fpdf.php');
        // while ($dados = mysqli_fetch_array($dados, MYSQLI_ASSOC)) {
        //     var_dump($dados);
        // };
class PDF extends FPDF
{
// Load data
// function LoadData($file)
// {
//     // Read file lines
//     $lines = ;
//     $data = array();
//     foreach($lines as $line)
//         $data[] = explode(';',trim($line));
//     return $data;
// }
// Better table
function start(){
        $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
    //CONECTAR NO IF
    // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
        $sql = "SELECT DISTINCT * FROM cartucho ORDER BY id Desc;";
        $dados = mysqli_query($connect, $sql);
        return $dados;
}
function ImprovedTable($header, $dados)
{
    $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
    //CONECTAR NO IF
    // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
    // Column widths
    $w = array(90, 90);
    // Header
    $this->SetFont('Arial', 'B', 16);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    $this-> SetFont('Arial', '', 14);
    while ($dado = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
        //Nome usuario
        $buscaNome = "SELECT (nome) FROM login WHERE cpf=" . $dado["usuario"] . ";";
        $pesquisa = mysqli_query($connect, $buscaNome);
        $nome = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC);
        //nome de quem deletou
        $this->Cell($w[0],6,$dado["nome"],'LRB',0,"C");
        $this->Cell($w[1],6,$nome["nome"],'LRB',0,"C");
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}
$pdf = new PDF();
// Column headings
$header = array('Nome do Cartucho', 'Dono');
$dados = $pdf->start();
// Data loading
$pdf->AddPage();
$pdf->ImprovedTable($header,$dados);
$pdf->Output();
?>