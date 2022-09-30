<?php 
include "vendor/autoload.php";

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

//selecionar apenas o número de matrícula
$qtdMatricula = 1;
for($i = 0; $i < $qtdMatricula; $i++){
    $matriculaAluno = ($matricula[$i]["matricula"]);

    echo $cracha = '
        <div class="cracha">
            <div class="crachaH">
                <img src="./img/download-removebg-preview.png">
                <img src="./img/jacitec-removebg-preview.png">
            </div>
            <div class="crachaBody">
                <h1> JACITEC 2022 </h1>
                <p> ' . $matriculaAluno . '</p>
                <p> ' . $generator->getBarcode(
                    $matriculaAluno,
                    $generator::TYPE_CODE_128
                ) . '</p>
            </div>
        </div>
    ';
}
?>