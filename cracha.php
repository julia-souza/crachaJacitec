<?php 
include "vendor/autoload.php";

$matricula = "20191si032"; //deixar dinâmico

$generator = new Picqer\Barcode\BarcodeGeneratorHTML();

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credencial Jacitec</title>
    <link rel="stylesheet" href="cracha.css">
</head>

    <div class="cracha">
        <div class="crachaH">
            <img src="./img/download-removebg-preview.png">
            <img src="./img/jacitec-removebg-preview.png">
        </div>
        <div class="crachaBody">
            <h1> JACITEC 2022 </h1>
            <p> <?php echo $matricula ?> </p>
            <p> <?php echo $generator->getBarcode(
                $matricula,
                $generator::TYPE_CODE_128
            ) ?> </p>
        </div>
    </div>
    