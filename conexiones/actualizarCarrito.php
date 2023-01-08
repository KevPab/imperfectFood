<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $cantidad = $_POST['cantidadParametro'];
    $id = $_POST['idProducto'];
    session_start();
    $idusuario = $_SESSION['idUsuario'];
    $resultado = mysqli_query($conn,"UPDATE carrito SET carrito.cantidad = '$cantidad' WHERE carrito.idcomprador = '$idusuario' AND carrito.idproducto = '$id'");
?>
           