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
    session_start();
    $cpf=$_SESSION["cpf"];
    $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
    //CONECTAR NO IF
    // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
        $sql = "SELECT DISTINCT * FROM cartucho WHERE usuario = ".$cpf." ORDER BY id Desc;";
        $dados = mysqli_query($connect, $sql);
        return $dados;
}

function ImprovedTable($header, $dados)
{
        function verificaimagem($imagem)
        {
            if ($imagem != NULL) {
                return $imagem;
            } else {
                $imagem = "../SemImagem.jpg";
                return $imagem;
            }
        }
    $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
    //CONECTAR NO IF
    // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
    // Column widths
    $w = array(55, 45, 35 ,45);
    // Header
    $this->SetFont('Arial', 'B', 16);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    $this->SetFont('Arial', '', 14);
    // Data
    while ($dado = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
        //Nome usuario
        $buscaNome = "SELECT (nome) FROM login WHERE cpf=" . $dado["usuario"] . ";";
        $pesquisa = mysqli_query($connect, $buscaNome);
        $nome = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC);
            if ($dado["localizado"] != NULL) {
                $imagem = $dado["localizado"];
            }else{
                $imagem = '';
            }
        //nome de quem deletou
        $this->Cell($w[0],46,$dado["nome"],'LRB',0,"C");
        $this->Cell($w[1],46,$dado["sistema"], 'LRB', 0, "C");
        $this->Cell($w[2],46,$dado["ano"], 'LRB', 0, "C");
        $this->Cell($w[3],46, $this->Image(verificaimagem($dado["localizado"]), $this->GetX(), $this->GetY()+1, 45),'LR',0,"C");
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}
$pdf = new PDF();
// Column headings
$header = array('Nome do Cartucho','Sistema','Ano', 'Imagem');
$dados = $pdf->start();
// Data loading
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->ImprovedTable($header,$dados);
$pdf->Output();
?>