<?php 
include "vendor/autoload.php";
use Dompdf\Dompdf;
use Dompdf\Options;


$dompdf = new Dompdf();

// $matricula = "20191si032"; //deixar dinâmico   

//gerar código de barras
$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

//ler csv com a matrícula
$path = "data.csv";

$handle = fopen($path, "r");
$header = fgetcsv($handle, 10000000, ",");

$qtdMatricula = 0;

while ($row = fgetcsv($handle, 1000, ",")) {
    $matricula[] = array_combine($header, $row);
    $qtdMatricula ++;
}
// print_r($matricula);
fclose($handle);
// echo $qtdMatricula;

//encode imagem
// $img_file = 'C:\wamp64\www\projetos\crachaJacitec\img\download-removebg-preview.jpg';
// $imgData = base64_encode(file_get_contents($img_file));
// $src = 'data: '.mime_content_type($img_file).';base64,'.$imgData;

//selecionar apenas o número de matrícula
// $qtdMatricula = 1;

for($i = 0; $i < $qtdMatricula; $i++){
    $matriculaAluno = ($matricula[$i]["matricula"]);
    $nomeAluno = ($matricula[$i]["nome"]);
    // $matriculaAluno = '20191si032';

    echo $cracha = '
        <div class="cracha" 
        style="margin: auto;
        display: flex;
        align-items: center;
        flex-direction: column;
        text-align: center;
        flex-wrap: wrap;
        border: 1px solid green;
        width: max-content; margin-bottom: 20px">
            <div class="crachaH">
                <img src="./img/download-removebg-preview.jpg" style="width:450px">
                <img src="./img/jacitec-removebg-preview.png" style="width:450px">
            </div>
            <div class="crachaBody" style="font-size:3rem; font-family:Roboto">
                <h1> JACITEC 2022 </h1>
                <p> ' . $nomeAluno . ' </p>
                <p> ' . $matriculaAluno . '</p>
                <p> ' . $generator->getBarcode(
                        $matriculaAluno,
                        $generator::TYPE_CODE_128
                    ) . '</p>
            </div>
        </div>
    ';
    // $options = new Options();
    // $options->setIsRemoteEnabled(true);
    // $options->set('isHtml5ParserEnabled', TRUE);
    // $dompdf->loadHtml($cracha);
    // $dompdf->setPaper('A4');
    // $dompdf->render();
    // $dompdf->stream();
}
?>
