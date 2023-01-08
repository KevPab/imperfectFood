
    (function () {
        
        imagen = document.getElementById("ImagenVendedor")
      let pattern1 = /^\S[A-Z|a-z|0-9|`|Ñ|ñ|áéíóú|&|.|\s|!|-|\-|\x22|'|,]{1,20}\S$/;            
      let pattern2 = /^[a-z|A-Z|0-9]+@[a-z]+\.[a-z]{1,3}$/; 
      let pattern3 = /^[A-Z|a-z|0-9|&|$|@|-|%|Ñ|ñ|*|#|,|_|.|;|+|/]{6,14}$/;  
      let pattern4 = /[7|6][0-9]{7}$/;
      let pattern5 = /https:\/\/goo.gl\/maps+\/\w+|https:\/\/maps.app.goo.gl\/\w+/;
      let pattern6 = /^\S[A-Z|a-z|0-9|Ñ|ñ|áéíóú|.|,|\s]{30,300}\S$/;
  
      var forms = document.querySelectorAll('.needs-validation')
  
      Array.prototype.slice.call(forms)
          .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            var formulario = form.getElementsByTagName("input");
            var alertas = form.getElementsByClassName("invalid-feedback");
            console.log(formulario);
  
            if (!formulario[0].value.match(pattern1)) {
              event.preventDefault()
              event.stopPropagation()
              document.getElementById("validacion1").innerText = "Ingrese un nombre válido";
              if(formulario[0].value == ""){
                document.getElementById("validacion1").innerText = "Este campo es obligatorio";
    
              }
            }
            
            if (!formulario[1].value.match(pattern2)) {
              event.preventDefault()
              event.stopPropagation()
              document.getElementById("validacion2").innerText = "Ingrese un email válido";
              if(formulario[1].value == ""){
              
                document.getElementById("validacion2").innerText = "Este campo es obligatorio";
    
              }
            }
  
            if (!formulario[2].value.match(pattern3)) {
              event.preventDefault()
              event.stopPropagation()
              document.getElementById("validacion3").innerText = "La contraseña debe tener un mínimo de 6 caracteres y un máximo de 14 caracteres";
              
              if(formulario[2].value == ""){

                document.getElementById("validacion3").innerText = "Este campo es obligatorio";
    
              }
            }
  
            if (!formulario[3].value.match(pattern4)) {
              event.preventDefault()
              event.stopPropagation()
              document.getElementById("validacion4").innerText = "El teléfono debe tener 8 digitos y comenzar con el 6 o el 7";
            
              if(formulario[3].value == ""){
              
                document.getElementById("validacion4").innerText = "Este campo es obligatorio";
                
              }
            }
  
            if (!formulario[4].value.match(pattern5)) {
              event.preventDefault()
              event.stopPropagation()
              document.getElementById("validacion5").innerText = "Ingrese una ubicación válida";
              if(formulario[4].value == ""){
              
                document.getElementById("validacion5").innerText = "Este campo es obligatorio";
    
              }
            }

            if (!formulario[5].value.match(pattern6)) {
                
                if(formulario[5].value == ""){
                
      
                }else{
                    event.preventDefault()
                    event.stopPropagation()

                }
            }

  
            if (formulario[6].files.length == 0) {

              event.preventDefault()
              event.stopPropagation()
              
            }else{
                const extensiones = ["png", "PNG", "jpg"];
                var nombreArchivo = formulario[6].files[0].name;
                const extension = nombreArchivo.substring(nombreArchivo.lastIndexOf('.') + 1, nombreArchivo.length);
                console.log(nombreArchivo);
                console.log(extension);
                if (!extensiones.includes(extension)){
                    formulario[6].value = null;
                    event.preventDefault()
                    event.stopPropagation()
                    document.getElementById("validacion7").innerText = "La imagen tiene que tener una extension .png o .jpg";

                }
            }
            form.classList.add('was-validated')
          }, false)
        })
    })()