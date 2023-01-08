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
    <link rel="stylesheet" href="carrito.css">
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

  <div class="shopping-cart" id="shopping-cart">
  <div class="cart-item">
        <img width="100" src="imagenes//Logo-Barra.jpeg" alt="" />
        <div class="details">
        
          <div class="title-price-x">
            <h4 class="title-price">
              <p>Comida</p>
              <p class="cart-item-price">$ 10</p>
            </h4>
            <i onclick="removeItem(${id})" class="bi bi-x-lg"></i>
          </div>
          <div class="cart-buttons">
            <div class="buttons">
              <i onclick="decrement(${id})" class="bi bi-dash-lg"></i>
              <div id=${id} class="quantity">0</div>
              <i onclick="increment(${id})" class="bi bi-plus-lg"></i>
            </div>
          </div>
          <h3>$ 100</h3>
        
        </div>
      </div>
      </div>
</body>


<script src="javascript/Data.js"></scrip>
<script src="javascript/cart.js"></>

</html>