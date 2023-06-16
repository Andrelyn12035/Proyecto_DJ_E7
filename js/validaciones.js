
function validar() {
   
   let nombre = document.forms["contratacion"]["nombre"].value;
   let paterno = document.forms["contratacion"]["a_paterno"].value; 
   let materno = document.forms["contratacion"]["a_materno"].value; 
   let curp = document.forms["contratacion"]["curp"].value;
   let correo = document.forms["contratacion"]["correo"].value;
   let calle = document.forms["contratacion"]["calle"].value;
   let num = document.forms["contratacion"]["num"].value;
   let colonia = document.forms["contratacion"]["colonia"].value;
   let codigo = document.forms["contratacion"]["codigo"].value;
   let alcaldia = document.forms["contratacion"]["alcaldia"].value;
   let estado = document.forms["contratacion"]["estado"].value;
   let lugar = document.forms["contratacion"]["lugar"].value;
   let fecha = document.forms["contratacion"]["fecha"].value;
   let hora = document.forms["contratacion"]["hora"].value;
   let evento = document.forms["contratacion"]["evento"].value;
   let otra_opc = document.forms["contratacion"]["fecha"].value;
   let menu = document.forms["contratacion"]["menu"].value;
   let personas = document.forms["contratacion"]["personas"].value;
   let alerta = document.getElementById("alerta")

   let nom = new RegExp("^[A-Z][a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(?:\\s+[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+){0,5}(?:\\s+[-\\sa-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)?$","")
   let corr = new RegExp("^\\w+([.-_+]?\\w+)*@\\w+([.-]?\\w+)*(\\.\\w{2,10})+$","")
   let call = new RegExp("^[0-9a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+(?:\s+[0-9a-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+){0,5}(?:\s+[-\sa-zA-ZáéíóúÁÉÍÓÚüÜñÑ]+)?$","")
   

   if (!nom.test(nombre) || nombre.length > 39 || nombre == "") {
      alerta.innerHTML ="nombre"
      $('#exampleModal').modal('show');
      return false;
   }else if (!nom.test(paterno) || paterno.length > 24 || paterno == "") {
      alerta.innerHTML ="paterno"
      $('#exampleModal').modal('show');
      return false;
   }else if (!nom.test(materno) || materno.length > 24 || materno == "") {
      alerta.innerHTML ="materno"
      $('#exampleModal').modal('show');
      return false;
   }else if (!curpValida(curp)) {
      alerta.innerHTML ="curp"
      $('#exampleModal').modal('show');
      return false;
   }else if (!corr.test(correo)) {
      alerta.innerHTML ="correo"
      $('#exampleModal').modal('show');
      return false;
   }else if (!call.test(calle)) {
      alerta.innerHTML ="calle"
      $('#exampleModal').modal('show');
      return false;
   }else if (num.length > 4) {
      alerta.innerHTML ="numero"
      $('#exampleModal').modal('show');
      return false;
   }else if (!nom.test(colonia) || colonia.length > 29) {
      alerta.innerHTML ="colonia"
      $('#exampleModal').modal('show');
      return false;
   }else if (codigo.length > 5 || codigo.length <4) {
      alerta.innerHTML ="codigo"
      $('#exampleModal').modal('show');
      return false;
   }else if (personas < 75 || personas > 200) {
      alerta.innerHTML ="personas"
      $('#exampleModal').modal('show');
      return false;
   }
   $('#confirmar').modal('show');
   
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
let pend = [], obj = {}, dis = [];
$("#lugar").on('change',function(){
   // para obter el id del pais
   $('.input-group.date').datepicker(
      'setDatesDisabled', ''
  );
   document.getElementById("fecha").value = '';
   document.getElementById("horario").innerHTML = '';
   document.getElementById("fecha").disabled = true;
   document.getElementById("horario").disabled = true;
   let cal = this.value;
   
   let currentDate = new Date();
   // Add one day to the current date
   let dia = new Date(currentDate);
   dia.setDate(currentDate.getDate() + 1);
   n_dia = dia.toLocaleDateString('en-GB');
   let data = {
      lugar: cal,
      fecha: n_dia
   };

   fetch('php/fecha.php', {
      method: 'POST',
      mode: "cors",
      headers: {
         'Content-Type': 'application/json'
      },
       body: JSON.stringify(data) 
    }).then(response => response.json())
    .then(result => {
      // Handle the response from PHP
      pend = [], obj = {}, dis = [];
      
      console.log(result);
      console.log(result.length);
      if (result.length == 0) {
         console.log("disponibles")
      }else{
         result.forEach(element => {
            let dateString = element.fecha
            let [day, month, year] = dateString.split('/')
            const fe = new Date(+year, +month - 1, +day)
            if (fe.getDay() != 0 ) {
               if (pend.includes(element.fecha)) {
                  dis.push(element.fecha)
               }else{
                  obj[element.fecha] = element.hora;
                  pend.push(element.fecha);
               }
            }else{
               dis.push(element.fecha)
            }
         })
         $('.input-group.date').datepicker(
            'setDatesDisabled', dis
        );
         console.log(pend)
         console.log(dis)
         console.log(obj)
      }
      document.getElementById("fecha").disabled = false;
    })
    .catch(error => {
      console.error('Error:', error);
    });
   
    


});

$("#fecha").on('change',function(){
   let fecha = this.value
   document.getElementById("horario").innerHTML = '';
   let dateString = fecha;
   let [day, month, year] = dateString.split('/')
   const fe = new Date(+year, +month - 1, +day)
   if (fe.getDay == 0) {
      document.getElementById("horario").innerHTML += '<option value="3">9-14 hrs</option>'
   }else if(fe.getDay == 6){
      if (Object.keys(obj).includes(fecha)) {
         let pos = Object.keys(obj).indexOf(fecha)
         let oc = Object.values(obj)[pos]
         console.log(oc)
         if (oc == 1) {
            document.getElementById("horario").innerHTML += '<option value="2">21-2 hrs</option>'
         }else{
            document.getElementById("horario").innerHTML += '<option value="1">14-19 hrs</option>'
         }
      }else{
         document.getElementById("horario").innerHTML += '<option value="1">14-19 hrs</option>'
         document.getElementById("horario").innerHTML += '<option value="2">21-2 hrs</option>'
      }
   }else{
      if (Object.keys(obj).includes(fecha)) {
         let pos = Object.keys(obj).indexOf(fecha)
         let oc = Object.values(obj)[pos]
         console.log(oc)
         if (oc == 1) {
            document.getElementById("horario").innerHTML += '<option value="2">19-0 hrs</option>'
         }else{
            document.getElementById("horario").innerHTML += '<option value="1">12-17 hrs</option>'
         }
      }else{
         document.getElementById("horario").innerHTML += '<option value="1">12-17 hrs</option>'
         document.getElementById("horario").innerHTML += '<option value="2">19-0 hrs</option>'
      }
   }
   document.getElementById("horario").disabled = false;

});

$("#entidad").on('change',function(){
      var otherOptionContainer = document.getElementById("otro_estado");
      var otherOptionInput = document.getElementById("col");
   if (this.value == "CDMX") {
         otherOptionContainer.style.display = "none";
         otherOptionInput.required = false;

         otherOptionInput.name = "otro"
         otherOptionInput.required = false
         document.getElementById("alcaldia").name = "alcaldia"
         document.getElementById("alcaldia").required = true
         document.getElementById("alcaldia").disabled = false
      } else {
         otherOptionContainer.style.display = "block";
         otherOptionInput.required = true;

         otherOptionInput.name = "alcaldia"
         otherOptionInput.required = true
         document.getElementById("alcaldia").name = "otro"
         document.getElementById("alcaldia").required = false
         document.getElementById("alcaldia").disabled = true
      }
    
   
})

$('#confirmar').on('shown.bs.modal', function (e) {
   console.log("hoa")
   document.getElementById("cliente").innerHTML = document.getElementsByName("nombre")[0].value
   document.getElementById("nom").innerHTML = document.getElementsByName("nombre")[0].value
   document.getElementById("pat").innerHTML = document.getElementsByName("a_paterno")[0].value
   document.getElementById("mat").innerHTML = document.getElementsByName("a_materno")[0].value
   document.getElementById("cur").innerHTML = document.getElementsByName("curp")[0].value
   document.getElementById("cor").innerHTML = document.getElementsByName("correo")[0].value
   document.getElementById("cal").innerHTML = document.getElementsByName("calle")[0].value
   document.getElementById("nu").innerHTML = document.getElementsByName("num")[0].value
   document.getElementById("co").innerHTML = document.getElementsByName("colonia")[0].value
   document.getElementById("c").innerHTML = document.getElementsByName("codigo")[0].value
   document.getElementById("mu").innerHTML =  document.getElementsByName("alcaldia")[0].value
   document.getElementById("es").innerHTML = document.getElementsByName("estado")[0].value
   document.getElementById("sed").innerHTML = document.getElementsByName("lugar")[0].value
   document.getElementById("fec").innerHTML = document.getElementsByName("fecha")[0].value
   document.getElementById("hor").innerHTML = document.getElementsByName("hora")[0].value
   document.getElementById("des").innerHTML = document.getElementsByName("evento")[0].value
   document.getElementById("men").innerHTML = document.getElementsByName("menu")[0].value
   document.getElementById("per").innerHTML = document.getElementsByName("personas")[0].value
   
})

$('#btnYes').click(function() {
   $('#fin').trigger( "click" );
});
