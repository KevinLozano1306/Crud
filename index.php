<?php

require 'config/conexion.php';

$db = new Database();
$con = $db->conectar();

$activo = 1;

$comando= $con->prepare("SELECT ID, RAM, Procesador, Disco, GPU, Unidades, Precio FROM computadores WHERE activo=:mi_activo ORDER BY ID ASC");
$comando->execute(['mi_activo' => $activo]);
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>
    <link rel="stylesheet" href="styles/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>


<body class="py-3">
<header class="bg_animate">
        <div class="header_nav">
            <div class="contenedor-title">
                <h1>Inventario Pc Gamer
                    
                </h1>
            </div>
        </div>

    
    </header>
    
    <main class="container contenedor">
        
        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-light">Computadores</h4>
                    <a href="nuevo.php" class="btn btn-primary float-right">Nuevo Pedido</a>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th >ID</th>
                                <th >RAM</th>
                                <th >Procesador</th>
                                <th >Disco</th>
                                <th >GPU</th>
                                <th >Unidades</th>
                                <th >Precios</th>
                                <th >Editar</th>
                                <th >Eliminar</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($resultado as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['ID']; ?></td>
                                    <td><?php echo $row['RAM']; ?></td>
                                    <td><?php echo $row['Procesador'];?></td>
                                    <td><?php echo $row['Disco'];?></td>
                                    <td><?php echo $row['GPU'];?></td>
                                    <td><?php echo $row['Unidades'];?></td>
                                    <td><?php echo $row['Precio'];?></td>
                                    <td><a href="editar.php?id=<?php echo $row['ID']; ?>" class="btn btn-warning">Editar</a></td>
                                    <td><a href="eliminar.php?id=<?php echo $row['ID']; ?>" class="btn btn-danger">Eliminar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>