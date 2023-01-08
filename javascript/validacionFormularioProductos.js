
    (function () {

        let pattern1 = /^\S[A-Z|a-z|0-9|`|&|.|'|Ñ|ñ|áéíóú|\s|!|-|,]{3,20}\S$/; 
        let pattern2 = /^[1-9]$|^[1-9][0-9]{1,3}$|^[0-9]{1,3}[,]([0][1-9]|[1-9][0-9])$|^10000$/; 
        let pattern3 = /^[1-9]$|^[1-9][0-9]{1,3}$|^[0-9]{1,3}[,]([0][1-9]|[1-9][0-9])$|^10000$/; 
        let pattern4 = /^([1-9][0-9]{0,3}|10000)$/; 
        let pattern5 = /^\S[A-Z|a-z|0-9|Ñ|ñ|áéíóú|.|,|\s]{30,300}\S$/;

        var forms = document.querySelectorAll('.needs-validation')
    
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              var formulario = form.getElementsByTagName("input");
              var alertas = form.getElementsByClassName("invalid-feedback");
              console.log(alertas);
    
    
              if (!formulario[0].value.match(pattern1)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion1").innerText = "Ingrese un nombre de producto válido";
                if(formulario[0].value == ""){
                
                  document.getElementById("validacion1").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[1].value.match(pattern2)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion2").innerText = "Ingrese un monto mayor a 0,00 y menor a 10000,00";

                if(formulario[1].value == ""){
                  document.getElementById("validacion2").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[2].value.match(pattern3)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion3").innerText = "Ingrese un monto mayor a 0,00 y menor a 10000,00";
                if(formulario[2].value == ""){
                  document.getElementById("validacion3").innerText = "Este campo es obligatorio";
      
                }
              }
    
              if (!formulario[3].value.match(pattern4)) {
                event.preventDefault()
                event.stopPropagation()
                document.getElementById("validacion4").innerText = "Ingrese un stock mayor a 0 y menor a 10 000";
              
                if(formulario[3].value == ""){
                
                  document.getElementById("validacion4").innerText = "Este campo es obligatorio";
                  
                }
              }

              if (!formulario[4].value.match(pattern5)) {
                
                if(formulario[4].value == ""){
                
      
                }else{
                    event.preventDefault()
                    event.stopPropagation()

                }
              }

              if (formulario[5].files.length == 0) {
                event.preventDefault()
                event.stopPropagation()
              }else{
                const extensiones = ["png","PNG" ,"jpg"];
                var nombreArchivo = formulario[5].files[0].name;
                const extension = nombreArchivo.substring(nombreArchivo.lastIndexOf('.') + 1, nombreArchivo.length);
                console.log(nombreArchivo);
                console.log(extension);
                if (!extensiones.includes(extension)){
                    formulario[5].value = null;
                    event.preventDefault()
                    event.stopPropagation()
                    document.getElementById("validacion5").innerText = "La imagen tiene que tener una extension .png o .jpg";

                }
              }
    
    
              form.classList.add('was-validated')
    
            }, false)
          })
      })()
        