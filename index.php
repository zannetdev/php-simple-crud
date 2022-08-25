<?php
require_once('conexion.php');
?>
<!doctype html>
<html lang="es">

<head>
  <title>Actividad 8</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <div class="row no-gutters">
    <div class="col-8 offset-2 mt-2">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"> Todos los coches</h4>
          <div class="row">
            <div class="col-12">
              <a href="nuevo.php" class="btn btn-success mb-2">Nuevo Coche</a>
            </div>
            <div class="col-12">
              <?php
              if (isset($_POST['editar'])) {
                $mat = $_POST['matricula'];
                $mar = $_POST['marca'];
                $anio = $_POST['anio'];
                $id_coche = $_POST['id_coche'];
                $cnx = getCnx();
                $i = mysqli_query($cnx, "UPDATE coche SET matricula = '{$mat}', marca = '{$mar}', anio_fab = '{$anio}' WHERE id_coche = '{$id_coche}'");
                if ($i) {
              ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><b>Coche Actualizado correctamente</b></strong>
                  </div>
              <?php
                }
              }
              ?>
              <?php
              if (isset($_GET['v']) == 1) {
               
              ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <strong><b>Coche Eliminado correctamente</b></strong>
                  </div>
              <?php
                
              }
              ?>
            </div>
            <div class="col-lg-12">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>MATRICULA</th>
                      <th>MARCA</th>
                      <th>AÑO FABRICACIÓN</th>
                      <th>OPCIONES</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $cnx = getCnx();
                    $data = mysqli_query($cnx, "SELECT * FROM coche ORDER BY anio_fab DESC");
                    while ($rgx = mysqli_fetch_array($data)) {
                    ?>
                      <tr>
                        <td scope="row">#<?php echo $rgx['id_coche'] ?></td>
                        <td><?php echo $rgx['matricula'] ?></td>
                        <td><?php echo $rgx['marca'] ?></td>
                        <td><?php echo $rgx['anio_fab'] ?></td>
                        <td>
                          <a href="editar.php?id_coche=<?php echo $rgx['id_coche']  ?>" class="btn btn-outline-info">Editar</a>
                          <a href="eliminar.php?id_coche=<?php echo $rgx['id_coche']  ?>" class="btn btn-outline-danger">Eliminar</a>
                        </td>
                      </tr>
                    <?php
                    }


                    ?>

                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>