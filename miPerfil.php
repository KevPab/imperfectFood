<?php
      
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    
    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

    session_start();
    //$ema = $_SESSION['email1'];
    //$pas = $_SESSION['pass1'];

    $id = $_SESSION['idUsuario'];

    $result = mysqli_query($conn,"SELECT NombreNegocio, contrasenia, Email, Telefono, Ubicacion, Descripcion, ImagenVendedor FROM vendedores WHERE vendedores.id = '$id' LIMIT 1");

    if(!$result){
       echo "ocurrio un error";
       exit;
    }

    for($i = 0; $resultado[$i] = mysqli_fetch_assoc($result); $i++) ;
    // Delete last empty one
    array_pop($resultado);      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">
    <title>Imperfect Food</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid">
          <a href ="paginaPrincipalVendedores.php">
            <img src="imagenes/Logo-Barra.jpeg" height="45px" alt="logo"> 
          </a>
          <a class="navbar-brand" href="paginaPrincipalVendedores.php">Imperfect Food</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <p style="opacity: 0;">Para rellenar</p>
          </div>
       </div>
    </nav>

    <div class = "row justify-content-center my-4" style="font-family:Arial">
        <div class="text-center">
            <h2>Mi perfil</h2>
        </div>
    </div>

        <?php if (is_array($resultado) || is_object($resultado)): {foreach($resultado as $row): ?>
          <div class="row justify-content-center my-2">
            <div class="col-lg-4">
              <div class="card mb-4 border-0" >
                <div class="card-body text-center" >
                  <img src="data:image/jpg;base64,<?php echo base64_encode($row['ImagenVendedor']);?>" width="250" height="250" alt="avatar"
                    class="rounded-0" >
                </div>
              </div>
            </div>
  
            <div class="col-lg-5" style="font-family:Arial">
              <div class="card mb-4 rounded-0">
                <div class="card-body rounded-0">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Nombre de negocio:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['NombreNegocio'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['Email'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Teléfono:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['Telefono'];?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Ubicación:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['Ubicacion'];?></p>
                    </div>
                  </div>

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Descripción:</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0"><?php echo $row['Descripcion'];?></p>
                    </div>
                  </div>
                  <?php endforeach;} endif;?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center" style="font-family:Arial">
            <div class="row justify-content-center my-5">
                <div class="col-2">
                    <a href="paginaPrincipalVendedores.php" class="btn btn-danger rounded-0" role="button">Volver</a>
                </div>
                
                <div class="col-2">
                    <a href="editarPerfilVendedor.php" class="btn btn-success rounded-0" role="button">Editar Perfil</a>
                </div>
                
                <div class="col-2">
                    <a href="formularioProductos.php" class="btn btn-success rounded-0" role="button">Añadir Producto</a>
                </div>
            </div>
        </div>

    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
</body>
</html>