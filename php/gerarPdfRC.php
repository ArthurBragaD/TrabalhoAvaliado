<?php
require('../fpdf/fpdf.php');
        // while ($dados = mysqli_fetch_array($dados, MYSQLI_ASSOC)) {
        //     var_dump($dados);
        // };
class PDF extends FPDF{
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
        $sql = "SELECT DISTINCT cartucho.*, login.nome as 'usuarionome' FROM cartucho JOIN login on cartucho.usuario = login.cpf ORDER BY id Desc;";
        $dados = mysqli_query($connect, $sql);
        return $dados;
}

function ImprovedTable($dados)
{
        function start()
        {
            $connect = mysqli_connect("localhost", "root", "", "Sistema_cartucho");
            //CONECTAR NO IF
            // $connect = mysqli_connect("localhost", "root", "mysqluser", "Sistema_cartucho");
            $sql = "SELECT DISTINCT cartucho.*, login.nome as 'usuarionome' FROM cartucho JOIN login on cartucho.usuario = login.cpf ORDER BY id Desc;";
            $dados = mysqli_query($connect, $sql);
            return $dados;
        }
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
    // Data
    $this->Cell(array_sum([180]),0,'','B');
        $this->Ln();
        // while ($dado = mysqli_fetch_array($dados, MYSQLI_ASSOC)){
        //     //Nome usuario
        //     $buscaNome = "SELECT (nome) FROM login WHERE cpf=" . $dado["usuario"] . ";";
        //     $pesquisa = mysqli_query($connect, $buscaNome);
        //     $nome = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC);
        //         if ($dado["localizado"] != NULL) {
        //             $imagem = $dado["localizado"];
        //         }else{
        //             $imagem = '';
        //         }
        //     //nome de quem deletou
        //     $this->Cell(60,5,$dado["nome"],'LR',0,"C");
        //     $this->Cell(60,5,$nome["nome"], 'LR', 0, "C");
            // $this->Cell($w[3],46, $this->Image(verificaimagem($dado["localizado"]), $this->GetX(), $this->GetY()+1, 45),'LR',0,"C");
        //     $this->Ln();
        // }

                    // while($dadoimagem = mysqli_fetch_array($dados, MYSQLI_ASSOC && $i1!=$i)){
                // $this->Cell(60, 30, $this->Image(verificaimagem($dadoimagem["localizado"]), $this->GetX(), $this->GetY(), 30), 'LR', 0, "C");
                // $i1++;
            // }

        $dados1 = start();
        $dados2 = start();
        $i=0;
        $i1=0;
        $i2=0;
        // while ($dado = mysqli_fetch_array($dados, MYSQLI_ASSOC)) {
        while ($dado = $dados->fetch_assoc()){
            //nome de quem deletou
            $this->Cell(60, 5, $dado["nome"], 'LRT', 0, "C");
            $i++;
            if ($i%3 == 0) {
            $this->Ln();
        // while ($dadonome = mysqli_fetch_array($dados1, MYSQLI_ASSOC || $i1!=$i)) {
            while ($i1!=$i){
                    $dadonome = $dados1->fetch_assoc();
            //Nome usuario
            $buscaNome = "SELECT (nome) FROM login WHERE cpf=" . $dadonome["usuario"] . ";";
            $pesquisa = mysqli_query($connect, $buscaNome);
            $nome = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC);
            $this->Cell(60, 5, $nome["nome"], 'LRB', 0, "C");
            $i1++;
        }
            $this->Ln();
         while ($i2!=$i){
            $dadoimagem = $dados2->fetch_assoc();
            //Nome usuario
            $this->Cell(60,42, $this->Image(verificaimagem($dadoimagem["localizado"]), $this->GetX()+10, $this->GetY()+1, 40), 'LRB', 0, "C");
            $i2++;
        }
        $this->Ln();
            }
        }
        if($i1!=$i){
            $this->Ln();
        while ($i1!=$i) {
            $dadonome = $dados1->fetch_assoc();
            //Nome usuario
            $buscaNome = "SELECT (nome) FROM login WHERE cpf=" . $dadonome["usuario"] . ";";
            $pesquisa = mysqli_query($connect, $buscaNome);
            $nome = mysqli_fetch_array($pesquisa, MYSQLI_ASSOC);
            $this->Cell(60, 5, $nome["nome"], 'LRB', 0, "C");
            $i1++;
        }
        $this->Ln();
        while ($i2 != $i) {
            $dadoimagem = $dados2->fetch_assoc();
            //Nome usuario
            $this->Cell(60, 42, $this->Image(verificaimagem($dadoimagem["localizado"]), $this->GetX() + 10, $this->GetY() + 1, 40), 'LRB', 0, "C");
            $i2++;
        }
    }
        // $this->Cell(array_sum([180]), 0, '', 'T');
    }
}
$pdf = new PDF();
// Column headings
$header = array('','','',);
$dados = $pdf->start();
// Data loading
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->ImprovedTable($dados);
$pdf->Output();

?>