<?php
require 'config/conexion.php';

$db = new Database();
$con = $db->conectar();

$ID = $_GET['id'];
$activo = 1;

$query = $con->prepare("SELECT RAM, Procesador, Disco, GPU, Unidades, Precio FROM computadores WHERE ID = :ID AND activo = :activo");
$query->execute(['ID'=>$ID,'activo'=>$activo]);
$num = $query->rowCount();
$row = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="estilo.css"> 

</head>
<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Nuevos Registros</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="row g-3" method="post" action="guardaredit.php" autocomplete="off">
                    <input type="hidden" id="id" name="id" class="form-control" value="<?php echo $ID; ?>">
                    <div class="form-group">
                             <label for="">RAM</label>
                                <select name="RAM" id="" class="form-control">
                                       <option value="4gb">4GB </option>
                                       <option value="8gb">8GB </option>
                                       <option value="16gb">16GB </option>
                                       <option value="32gb">32GB </option>
                                   </select>
                         </div>

                         <div class="form-group">
                                <label for="">Procesador</label>
                                 <input type="text" name="Procesador" id="Procesador" class="form-control" value="<?php echo $row['Procesador']; ?>" required autofocus>
                         </div>

                            <div class="form-group">
                                <label for="">Disco</label>
                                <input type="text" name="Disco" id="Disco" class="form-control" value="<?php echo $row['Disco']; ?>" required autofocus>

                            </div>

                            <div class="form-group">
                                <label for="">GPU</label>
                                <input type="text" name="GPU" id="GPU" class="form-control" value="<?php echo $row['GPU']; ?>" required autofocus>

                            </div>

                            <div class="form-group">
                                <label for="">Unidades</label>
                                <input type="text" name="Unidades" id="Unidades" class="form-control" value="<?php echo $row['Unidades']; ?>" required autofocus>

                            </div>

                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="text" name="Precio" id="Precio" class="form-control" value="<?php echo $row['Precio']; ?>" required autofocus>
                         </div>
                         <div class="modal-footer">
                            <a href="index.php" class="btn btn-secondary">Regresar</a>
                            <button type="submit" class="btn btn-primary">Guardar Pedido</button>
                         </div>
                    </form>
                </div>
            </div>
        </div>
    </main>        
</body>
</html>