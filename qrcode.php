<link rel="stylesheet" href="/crachaNovo.css">
<?php
    
    include "vendor/autoload.php";
    use chillerlan\QRCode\QRCode;
    use chillerlan\QRCode\QROptions;

    use Dompdf\Dompdf;
    
    $dompdf = new DOMPDF();
    // $dompdf->set_base_path('/crachaNovo.css');

    $img = "img/banner-jacitec-22.png";
    $img2 = file_get_contents("img/banner-jacitec-22.png");
    $imgEnconded = base64_encode($img);
          
    //echo $imgEnconded;

    $data = "data.csv";
    $data2 = '20191si032';

    $handle = fopen($data, "r");
    $header = fgetcsv($handle, 10000000, ",");

    $qtdMatricula = 0;

    while ($row = fgetcsv($handle, 1000, ",")) {
        $matricula[] = array_combine($header, $row);
        $qtdMatricula ++;
    }

    fclose($handle);
    
    $qtdMatricula = 1;
    // 
    for($i = 0; $i < $qtdMatricula; $i++){
        $matriculaAluno = ($matricula[$i]["matricula"]);
        $nomeAluno = ($matricula[$i]["nome"]);
        echo $identificacao = '<div class="base">
                <img class="banner" src="img/banner-jacitec-22.png"/>
                <h1> ' . $nomeAluno . ' </h1>
                <img id="qrcode" src="'.(new QRCode)->render($matriculaAluno).'"/>
                <h2> ' . $matriculaAluno . ' </h2>
                </div>';
        
        
        // $dompdf->load_html($identificacao, $encoding=null);           
        // $dompdf->set_paper("A4", "portrail");
        // $dompdf->render();
        // $dompdf->stream("identificacao.pdf");
    }
    
    
      
?>
