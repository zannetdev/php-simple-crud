<?php
require_once('conexion.php');
$cnx = getCnx();
$uid = $_GET['id_coche'];
$data = mysqli_query($cnx, "SELECT * FROM coche WHERE id_coche = {$uid}");
$dx = mysqli_fetch_object($data);

!($dx) ? header('Location: ./index.php') : '';
?>
<!doctype html>
<html lang="es">

<head>
    <title>Editar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="row no-gutters">
        <div class="col-8 offset-2 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Editar</h4>
                    <?php 
                        if (isset($_POST['edit'])) {
                            if($_POST['matricula'] != '' && $_POST['marca'] != '' && $_POST['anio'] != ''){
                                $mat = $_POST['matricula'];
                                $mar = $_POST['marca'];
                                $anio = $_POST['anio'];
                                $id_coche = $_POST['id_coche'];
                            }else{
                                ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <strong><b>Rellena</b> todos los campos.</strong> 
                                    </div>
                                    
                                    
                                <?php
                            }
                        }
                    ?>
                    <form action="index.php" method="POST">
                        <input type="hidden" name="id_coche" value="<?php echo $dx->id_coche ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Matricula</label>
                                    <input type="text" value="<?php echo $dx->matricula ?>" class="form-control" name="matricula" placeholder="XXX-XXX">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" value="<?php echo $dx->marca ?>" class="form-control" name="marca" placeholder="Marca">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Año Fabricación</label>
                                    <select name="anio" class="form-control">
                                        <option value="">Seleccione un año</option>
                                        <?php
                                        $y = $dx->anio_fab;

                                        for ($d = date('Y'); $d >= 2000; $d--) {
                                            $c = $y == $d ? 'SELECTED' : '';
                                        ?>
                                            <option <?php echo $c ?> value="<?php echo $d ?>"><?php echo $d ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="editar" class="btn btn-outline-success col-12">
                                    Actualizar
                                </button>
                            </div>
                            <div class="col-12 mt-2">
                                <a href="./index.php" class="btn btn-outline-danger col-12">
                                    Coches
                                </a>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>