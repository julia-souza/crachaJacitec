<head>
    <link rel="stylesheet" href="cracha.css">
</head>
<?php

include "vendor/autoload.php";

$matricula = "20191si032"; //deixar dinâmico

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

$cracha = '
        <div class="cracha">
            <div class="crachaH">
                <img src="./img/download-removebg-preview.png">
                <img src="./img/jacitec-removebg-preview.png">
            </div>
            <div class="crachaBody">
                <h1> JACITEC 2022 </h1>
                <p> ' . $matricula . '</p>
                <p> ' . $generator->getBarcode(
                    $matricula,
                    $generator::TYPE_CODE_128
                ) . '</p>
            </div>
        </div>
    ';

echo $cracha;    
?>