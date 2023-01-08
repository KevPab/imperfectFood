<?php
    $servername = "localhost";
    $database = "imperfectfood";     
    $username = "root";
    $password = "";
    $conn = mysqli_connect($servername, $username, $password, $database);
    $idcapturado = $_POST['idProducto'];
    session_start();
    $idusuario = $_SESSION['idUsuario'];
    $resultado = mysqli_query($conn,"DELETE FROM carrito WHERE carrito.idcomprador ='$idusuario' AND carrito.idproducto = '$idcapturado'");
    $url= '../carrito.php';
    echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
?>
                                