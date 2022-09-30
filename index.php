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
        <div class="cracha" 
        style="margin: auto;
        display: flex;
        align-items: center;
        flex-direction: column;
        text-align: center;
        flex-wrap: wrap;
        border: 1px solid;
        width: max-content;">
            <div class="crachaH">
                <img src="./img/download-removebg-preview.png" style="width:450px">
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
}
?>
