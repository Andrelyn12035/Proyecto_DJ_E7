function validarCo() {
   
   let curp = document.forms["comprobante"]["curp"].value;
   let lugar = document.forms["comprobante"]["lugar"].value;
   let fecha = document.forms["comprobante"]["fecha"].value;
   let hora = document.forms["comprobante"]["hora"].value;
   let alerta = document.getElementById("alerta")

   let nom = new RegExp("^[A-Z][a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(?:\\s+[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+){0,5}(?:\\s+[-\\sa-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)?$","")
   let corr = new RegExp("^\\w+([.-_+]?\\w+)*@\\w+([.-]?\\w+)*(\\.\\w{2,10})+$","")
   let call = new RegExp("^[0-9a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(?:\s+[0-9a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+){0,5}(?:\s+[-\sa-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)?$","")
   

   if (!curpValida(curp)) {
      alerta.innerHTML ="curp"
      $('#exampleModal').modal('show');
      return false;
   }else{
      document.getElementById("fol").value = curp+lugar+fecha+hora
      console.log(curp+lugar+fecha+hora)
      $('#comp').trigger( "click" );
   }

   
}

function curpValida(str) {
   var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
       validado = str.match(re);
  
   if (!validado)  //Coincide con el formato general?
      return false;
   
   //Validar que coincida el dígito verificador
   function digitoVerificador(cadena) {
       //Fuente https://consultas.curp.gob.mx/CurpSP/
       var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
           lngSuma      = 0.0,
           lngDigito    = 0.0;
       for(var i=0; i<17; i++)
           lngSuma = lngSuma + diccionario.indexOf(cadena.charAt(i)) * (18 - i);
       lngDigito = 10 - lngSuma % 10;
       if (lngDigito == 10) return 0;
       return lngDigito;
   }
 
   if (validado[2] != digitoVerificador(validado[1])) 
      return false;
       
   return true; //Validado
}

$("#fecha").on('change',function(){
   let fecha = this.value
   document.getElementById("horario").innerHTML = '';
   let dateString = fecha;
   let [day, month, year] = dateString.split('/')
   const fe = new Date(+year, +month - 1, +day)
   date = fe.toLocaleDateString('en-GB');
   console.log(date)
   console.log(fe.getDay())
   if (fe.getDay() == 0) {
      document.getElementById("horario").innerHTML += '<option value="09">09 - 14 hrs</option>'
   }else if(fe.getDay() == 6){
      document.getElementById("horario").innerHTML += '<option value="14">14 - 19 hrs</option>'
      document.getElementById("horario").innerHTML += '<option value="21">21 - 02 hrs</option>'
      
      }else{
         document.getElementById("horario").innerHTML += '<option value="12">12 - 17 hrs</option>'
         document.getElementById("horario").innerHTML += '<option value="19">19 - 00 hrs</option>'
      }
   document.getElementById("horario").disabled = false;

});