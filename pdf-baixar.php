<!-- <link rel="stylesheet" href="./pdf.css> -->
<?php

include "vendor/autoload.php";

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

$mpdf = new \Mpdf\Mpdf();

$stylesheet = file_get_contents('./pdf.css');

// $mpdf->WriteHTML($stylesheet);
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);


$img = "img/banner-jacitec-22.png";
$imgEnconded = base64_encode($img);

$data = "data.csv";

$handle = fopen($data, "r");
$header = fgetcsv($handle, 10000000, ",");

$qtdMatricula = 0;

while ($row = fgetcsv($handle, 1000, ",")) {
    $matricula[] = array_combine($header, $row);
    $qtdMatricula++;
}

fclose($handle);

$body;

// Exibir na tela 

for ($i = 0; $i < $qtdMatricula; $i++) {
    $matriculaAluno = ($matricula[$i]["matricula"]);
    $nomeAluno = ($matricula[$i]["nome"]);

    $identificacao = '
                    <div class="base">
                        <img class="banner" src="img/banner-jacitec-22.png"/>
                        <h1> ' . $nomeAluno . ' </h1>
                        <div class="qrcd">
                            <img class="qrc" id="qrcode" src="' . (new QRCode)->render($matriculaAluno) . '"/>
                        </div>
                        <h2> ' . $matriculaAluno . ' </h2>
                    </div>
                ';

                $body .= $identificacao;

    // $mpdf->WriteHTML($identificacao);
}
$mpdf->WriteHTML($body);
$mpdf->Output('qrcode.pdf',\Mpdf\Output\Destination::DOWNLOAD);

?>