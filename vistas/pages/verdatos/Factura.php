<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    <p>Factura</p>
    <input type="text" value="<?php echo $id; ?>">
    <?php foreach($this->modelVenta->ListarVenta11($id) as $r):?>
                  <tr>
                      <td><?php echo $r->iddv; ?></td>
                      <td><?php echo $r->pron; ?></td>
                      
                  </tr>
              <?php endforeach; ?> 
</body>
</html>