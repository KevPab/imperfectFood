<?php
    //Get Heroku ClearDB connection information
   $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
   $cleardb_server = $cleardb_url["host"];
   $cleardb_username = $cleardb_url["user"];
   $cleardb_password = $cleardb_url["pass"];
   $cleardb_db = substr($cleardb_url["path"],1);
   $active_group = 'default';
   $query_builder = TRUE;
   // Connect to DB
   $conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

   $emailactual = $_POST['Email'];

    $consultaVendedores = mysqli_query($conn,"SELECT * FROM vendedores WHERE Email = '$emailactual'  LIMIT 1");
    $consultaCompradores = mysqli_query($conn,"SELECT * FROM compradores WHERE Email = '$emailactual' LIMIT 1");

    if (mysqli_num_rows($consultaVendedores) > 0){
        $url = '../formularioCompradoresFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }else if(mysqli_num_rows($consultaCompradores) > 0){
        $url= '../formularioCompradoresFallido.php';
        echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
    }else{
        
        session_start();

	    $Name = $_POST['NombreNegocio']; 
        $password = $_POST['password'];
        $email = $_POST['Email'];
	    $number = $_POST['Telefono'];
        $ubicacion = $_POST['Ubicacion'];

        $query = "INSERT INTO compradores(NombreNegocio, contrasenia,  Email, Telefono, Ubicacion) VALUES ('$Name', '$password', '$email', '$number', '$ubicacion')";
        $insertar = $conn->query($query);
        if($insertar){

            $last_id = $conn->insert_id;
            $_SESSION['idUsuario'] = $last_id;

            $url= '../paginaPrincipalCompradores.php';
            echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
        }else{
            echo "Los datos no pudieron insertarse";
        }  
    } 
?>


