<?php
       $servername = "localhost";
       $database = "imperfectfood";     
       $username = "root";
       $password = "";
       $conn = mysqli_connect($servername, $username, $password, $database);
       session_start();
       $idusuario = $_SESSION['idUsuario'];

       $resultado = mysqli_query($conn,"SELECT productos.id,productos.ImagenProducto,productos.NombreDeProducto,productos.PrecioDeOferta,carrito.cantidad FROM carrito,productos WHERE carrito.idcomprador = '$idusuario' AND carrito.idproducto = productos.id");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperfect Food</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

</head>
<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid" style="font-family:Helvetica;font-size: 18px">
        <a href ="paginaPrincipalVendedores.php">
            <img src="imagenes/Logo-Barra.jpeg" height="45px" alt="logo"> 
        </a>
        <a class="navbar-brand" href="paginaPrincipalVendedores.php">Imperfect Food</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
           </div>
        </div>
     </nav>

<br>
<br>

<div class="text-center" style="font-family:Arial;font-size: 18px">
        <h2>Carrito de Compras</h2>       
</div class="alert alert-danger" role="alert">

  <br>
  <br>


  <div class="container-my-4" style="font-family: Arial">
    <div class="row row-cols-1 justify-content-center" style="margin-right: 0px; margin-left: 0px;">
      
         <?php $variable = 0 ; if (is_array($resultado) || is_object($resultado)): foreach($resultado as $row){ ?>
              <div class="col" style="margin-bottom: 25px; width: 600px; padding-top: 1px; margin-left: 100px;margin-right: 100px;">
                <div class="card shadow-sm border-danger" style="height:100%!important;">
                  <div class="row justify-content-center ">

                    <div class="col">
                      <div class="card border-0 m-0" >
                        <div class="card-body text-center p-0" style="margin-bottom: 0px;">
                          <img src="data:image/jpg;base64,<?php echo base64_encode($row['ImagenProducto']);?>"  width="100" height="100"> 
                          
                            
                          
                        </div>
                      </div>
                    </div>

                    <div class="col align-self-center text-center m-0">
                      <h5> <?php echo $row['NombreDeProducto'];?> </h5>
                    </div>

                    <div class="col align-self-center text-center m-0">
                      <h5> <?php echo $row['PrecioDeOferta'];?> Bs. </h5>
                    </div>

                    <div class="col align-self-center text-center m-0">
                      <div class="cart-buttons">
                        <div class="buttons">
                          <i class="bi bi-dash-lg" id='disminuir' style="cursor:pointer;color:red" onclick="disminuir('<?php echo $row['id'];?>','<?php echo $row['cantidad'];?>')"></i>
                          <input type='text' id="<?php echo $row['id'];?>" value = "<?php echo $row['cantidad'];?>" class="border-0" style="width: 20px; padding-left: 6px;">
                          <i class="bi bi-plus-lg" id='aumentar' style="cursor:pointer;color:green" onclick="aumentar('<?php echo $row['id'];?>','<?php echo $row['cantidad'];?>')"></i>
                          
                          <script>
                                function aumentar(idProducto,variable){ 
                                    var cantidad = document.getElementById(idProducto).value++;
                                    cantidad++;
                                    var idProd = idProducto;
                                    var parametros ={
                                                  "cantidadParametro" :cantidad,
                                                  "idProducto"        :idProd};
                                    $.ajax({
                                      data:   parametros,
                                      url:    'conexiones/actualizarCarrito.php',
                                      type:   'post',
                                      success: function(){
                                      }
                                    });
                                  
                                }
                                function disminuir(idProducto,variable){
                                  
                                    var cantidad = document.getElementById(idProducto).value--;
                                    cantidad--;
                                    var idProd = idProducto;
                                    var parametros ={
                                                  "cantidadParametro" :cantidad,
                                                  "idProducto"        :idProd};
                                    $.ajax({
                                      data:   parametros,
                                      url:    'conexiones/actualizarCarrito.php',
                                      type:   'post',
                                      success: function(){
                                      }
                                    });
                                }
                          </script>
                        </div>
                      </div>
                    </div>

                    <div class="col align-self-center text-center m-0">
                      <h5> <?php echo $row['PrecioDeOferta'];?> Bs. </h5>
                    </div>

                    <div class="col align-self-start text-end m-0">
                      <i type="button" class="bi bi-x-circle-fill" id='eliminar' onclick="eliminar('<?php echo $row['id'];?>')"></i>
                          <script>
                                function eliminar(idProducto){ 
                                    var idProdu = idProducto;
                                    var parametros ={ "idProducto"        :idProdu};
                                    $.ajax({
                                      data:   parametros,
                                      url:    'conexiones/eliminarCarrito.php',
                                      type:   'post',
                                      success: function(){
                                        window.location.href = 'carrito.php';
                                      }
                                    });
                                  
                                }
                          </script>
                    </div>

                  </div>
                </div>
              </div>
            <?php $variable += 1;} endif;?>
            


      
     </div>
  </div>

  <div class="d-flex justify-content-center flex-nowrap my-3">
      <div>
        <a href="paginaPrincipalCompradores.php" class="btn btn-danger rounded-0" role="button">Cancelar</a>
      </div>
      <div style="opacity: 0;">
        Textosasasa
      </div>
      <div>
        <button href="#" class="btn btn-success rounded-0">Realizar pedido</button>
      </div>
  </div>

</body>


<script src="javascript/Data.js"></scrip>
<script src="javascript/cart.js"></>

</html>