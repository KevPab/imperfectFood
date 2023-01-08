<?php
/*
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url["host"];
    $cleardb_username = $cleardb_url["user"];
    $cleardb_password = $cleardb_url["pass"];
    $cleardb_db = substr($cleardb_url["path"],1);
    $active_group = 'default';
    $query_builder = TRUE;
    

    $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
*/

$servername = "localhost";
$database = "imperfectfood";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password, $database);
session_start();
  
    $email = $_POST['Email'];
    $password = $_POST['password'];

    $consultaVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$email' AND vendedores.contrasenia = '$password' LIMIT 1");
    $consultaCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$email' AND compradores.contrasenia = '$password' LIMIT 1");

    if (mysqli_num_rows($consultaVendedores) > 0){

        $consultaIdVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$email' AND vendedores.contrasenia = '$password' LIMIT 1");

        $row = mysqli_fetch_row($consultaIdVendedores);
        $last_id = $row[0];
        $_SESSION['idUsuario'] = $last_id;
         

            $url= '../paginaPrincipalVendedores.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
           
    }
    else if(mysqli_num_rows($consultaCompradores) > 0){

            $row = mysqli_fetch_row($consultaCompradores);
            $last_id = $row[0];
            $_SESSION['idUsuario'] = $last_id;
        
            //echo $_SESSION['idUsuario'];
            $url= '../paginaPrincipalCompradores.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
           

    }else{
        $url= '../loginFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    } 

    //delete from marks order by id desc limit 1
    

    

    /* 

    $consultaIdCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$emailactual' AND compradores.contrasenia = '$passactual' LIMIT 1");
    $consultaIdVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$emailactual' AND vendedores.contrasenia = '$passactual' LIMIT 1");

    if (mysqli_num_rows($consultaIdCompradores) > 0) {
        while ($row = $result -> fetch_row()) {
            printf ($row[0]);
        }
    } elseif(mysqli_num_rows($consultaIdVendedores) > 0) {
        while ($row = $result -> fetch_row()) {
            printf ($row[0]);
        }
    } else{
        $url= '../loginFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }
    
    
    
    

    */

    
?>


