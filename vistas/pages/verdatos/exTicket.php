<?php
//$medidaTicket = 180;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>

    <style>
       * {
    font-size: 12px;
    font-family: 'Times New Roman';
    margin:2px;
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

td.producto,
th.producto {
    width: 75px;
    max-width: 75px;
}

td.cantidad,
th.cantidad {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.precio,
th.precio {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

.centrado {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
    
}

img {
    max-width: inherit;
    width: inherit;
    
}
    </style>
<script>
// Code goes here

/*function imprimir() {
    window.print();
}*/
</script>
</head>
<body>
<?php
    $jpg = file_get_contents("img/logoblancocuadrado.jpg");
    $jpgbase64 = base64_encode($jpg);
    /*$png = file_get_contents("1.png");
    $pngbase64 = base64_encode($png);*/
?>
<div class="ticket">
<h2 class="center teal-text"><i class="medium material-icons"><img style="margin-left:45px; height:100px; width:100px;" src="data:image;base64,<?= $jpgbase64;?>" alt="Logotipo"></i></h2>
            <p style="margin-left:40px;" class="centrado"><b>DISTIBUIDORA
                <br>ESPECIAL</b>
                
                <br></p>
                <p style="margin-left:30px;"><?php echo $fe;?></p>
                
            <table>
                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="producto">PRODUCTO</th>
                        <th class="precio">PRECIO($)</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($this->modelVenta->ListarVenta11($id) as $r):?>
                    <tr>
                        <td class="cantidad"><?php echo $r->cantidad; ?></td>
                        <td class="producto"><?php echo $r->pron; ?></td>
                        <td class="precio"><?php echo $r->preciov; ?></td>
                    </tr>
                    
                    <?php endforeach; ?> 
                    <tr>
                        <td class="cantidad"></td>
                        <td class="producto"><b>TOTAL</b></td>
                        <td class="precio"><b><?php echo $total;?></b></td>
                    </tr>
                </tbody>
            </table><br>
            <p style="margin-left:38px;" class="centrado">¡GRACIAS POR SU COMPRA!
                <br><b>Grupo#2 ULS-PPI-PSL-2020</b></p>
        </div>

    
</body>
</html>