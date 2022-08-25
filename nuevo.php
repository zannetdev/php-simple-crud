<?php
require_once('conexion.php');

?>
<!doctype html>
<html lang="es">

<head>
    <title>Agregar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="row no-gutters">
        <div class="col-8 offset-2 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> Agregar</h4>
                    <?php 
                        if (isset($_POST['add'])) {
                            if($_POST['matricula'] != '' && $_POST['marca'] != '' && $_POST['anio'] != ''){
                                $mat = $_POST['matricula'];
                                $mar = $_POST['marca'];
                                $anio = $_POST['anio'];
                                $cnx = getCnx();
                                $q = mysqli_query($cnx, "INSERT INTO coche (id_coche, matricula, marca, anio_fab)
                                VALUES(null, '{$mat}', '{$mar}', '{$anio}')");
                                if($q){
                                    ?>
                                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <strong><b>Coche registrado</b></strong> 
                                    </div>
                                    <?php
                                }
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
                    <form action="nuevo.php" method="POST">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Matricula</label>
                                    <input type="text" class="form-control" name="matricula" placeholder="XXX-XXX">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Marca</label>
                                    <input type="text" class="form-control" name="marca" placeholder="Marca">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Año Fabricación</label>
                                    <select name="anio" class="form-control">
                                        <option value="">Seleccione un año</option>
                                        <?php
                                        for ($d = date('Y'); $d >= 2000; $d--) {
                                        ?>
                                            <option value="<?php echo $d ?>"><?php echo $d ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="add" class="btn btn-outline-success col-12">
                                    Agregar
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