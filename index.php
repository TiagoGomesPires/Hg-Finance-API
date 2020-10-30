<!DOCTYPE html>
    <html lang="en">
        <head>

            <link rel="stylesheet" href="./css/style.css"/>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://fonts.googleapis.com/css2?family=Turret+Road:wght@800&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
            <title>Cotação de Bitcoins</title>

        </head>
        <body>

        <p id="tituloCotacao">Cotação em Tempo Real de Moedas</p>
        <?php
            include 'hg_finance.php';
            $HGFinance = new HGFinance('da7ea946');

            $finance = $HGFinance->get();

            //pr($HGFinance->data);
        ?>     

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p id=nome_moeda>   Dólar  </p>
                    <p id=dolar> <?php echo "R$ " . $finance['currencies']['USD']['buy'] ?>      </p>
                </div>
            </div>
        </div>

            <?php
                //Mostrar Bitcoins
                foreach ($finance['bitcoin'] as $key => $value) : echo "<hr></hr>" ?> 
                <P id="nome_moeda">    <?php  echo "( " . $value['name']. " )"; ?><p>
                <p style = "color: <?php   echo $value['variation'] >= 0 ? 'green' : 'red';    ?>;">
                <?php       echo ($value['format'][0] == 'BRL' ? 'R$ ' : 'U$ ') . number_format($value['last'], 2, ',', '.') ?>
                <small>(<?php         echo $value['variation'];     ?>)</small>
                <?php   endforeach  ?>    

        </body>
    </html>

