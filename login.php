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
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/estiloLogin.css">
    <title>Login</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <div>
            <a href ="index.php">
              <img src="imagenes/Logo-Barra.jpeg" height="45px" alt="logo"> 
            </a>
            <a class="navbar-brand" href="index.php">
              Imperfect Food
           </a>
          </div>
         
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                 <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       Registrarse
                   </a>
                   <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="formularioCompradores.php">Comprador</a></li>
                      <li><a class="dropdown-item" href="formularioVendedores.php">Vendedor</a></li>
                   </ul>
                   
                 </li>
               </ul>
             </div>
         </div>
       </nav>
    
        <div class="container py-2" style="font-family:Arial">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-7" style=" margin-top: 50px; border-radius: 10px; box-shadow: 10px 10px 10px -6px black; " >
              <div class="card" style="border :none">
                <div class = "row justify-content-center my-2">
                    <div class="text-center">
                        <h2 style="font-family:verdana;font-size: 26px">Iniciar Sesión</h2>
                    </div>
                    <div style="opacity: 0;">
                        Textosasasa
                    </div>
                    
                </div>
                <div class="row g-0">
                  <div class="col-md-6 col-lg-5 d-none d-md-block">
                    <img src="imagenes/logo-Imperfect Food.jpeg" style="margin-left: 20%; margin-top: 10%;" height="200px" width="200px">
                  </div>
                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form action="conexiones/redirigirUsuario.php" method="post" enctype = "multipart/form-data" class="needs-validation" novalidate>
                        
                          <div class="form-outlin.e mb-4">
                            <label for="Email" class="form-label">Email: </label>
                              <input type="text" name="Email" id="Email" class="form-control" pattern = "^[a-z|A-Z|0-9]+@[a-z]+\.[a-z]{1,3}$" placeholder = "ejemplo@gmail.com" required>
                              <div class="invalid-feedback">
                                 Ingrese un email válido
                              </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-8">
                                <label for="password" class="form-label">Contraseña:</label>
                                 <input name="password" type="password" class="form-control" id="password" aria-label="password" aria-describedby="basic-addon1" pattern = "^[A-Z|a-z|0-9|&|$|@|-|%|*|#|,|.|;|+|/]{6,14}$" required />
                                 <div class="invalid-feedback">
                                    La contrasea debe tener un minimo de 6 caracteres y maximo 14
                                  </div>
                            </div>
                            <div class="col-lg-3 my-2">
                                <div class="input-group-append my-4">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                      <i class="fas fa-eye" id="show_eye"></i>
                                      <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                          </div>
                        
                        <div class="d-flex justify-content-between">
                            <div>
                                <button type="submit" class="btn btn-success rounded-0">Ingresar</button>
                            </div>
                            <div style="opacity: 0;">
                                Textosasasa
                            </div>
                            <div >
                                <a href="index.php" class="btn btn-danger rounded-0" role="button">Cancelar</a>
                            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <script src="javascript/validacion.js"></script>
    <script src="javascript/paraElOjo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" 
    crossorigin="anonymous"></script>
    
</body>
</html>