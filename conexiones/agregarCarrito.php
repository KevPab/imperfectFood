<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $idcapturado = $_POST['valorNumero'];
    session_start();
    $idusuario = $_SESSION['idUsuario'];
    $resultado = mysqli_query($conn,"INSERT INTO carrito(idcomprador,idproducto,cantidad,subtotal) VALUES ('$idusuario','$idcapturado',1,0)");
?>
                                