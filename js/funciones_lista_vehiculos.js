document.addEventListener("DOMContentLoaded", function(event){
var seleccion = document.getElementById('filtro');
console.log(seleccion.value);
if(seleccion.value=="0" || seleccion.value=="x"){
  document.getElementById('busqueda').disabled=true;
  document.getElementById('bntBuscar').disabled=true;}
})

function Filtrar(){
  var seleccion = document.getElementById('filtro');
  console.log(seleccion.value);
  if(seleccion.value=="0" || seleccion.value=="x"){
    document.getElementById('busqueda').disabled=true;
    document.getElementById('bntBuscar').disabled=true;
  
    window.location.href = "../secciones/estado_vehiculos.php";}
  else{
    document.getElementById('busqueda').disabled=false;
    document.getElementById('bntBuscar').disabled=false;
  }
}



   window.onload = function(){
    var tabla = document.getElementById('tablap');
    for(var i = 1; i < tabla.rows.length; i++)
      {
          tabla.rows[i].onclick = function() 
          { document.getElementById("btnActualizar").disabled = false;
            document.getElementById("btnEliminar").disabled = false;
            document.getElementById("m_estado").disabled = false;

            document.getElementById("btnAgregar").style.visibility = "hidden";
            document.getElementById("btnNuevo").style.display = "block";

            document.getElementById("m_modelo").style.display="inline";
            document.getElementById("tm_modelo").style.display="inline";
            document.getElementById("n_modelo").style.display="none";
            document.getElementById("tn_modelo").style.display= "none";

            document.getElementById("m_placa").readOnly = true;
            document.getElementById("m_modelo").readOnly = true;
            document.getElementById("m_marca").readOnly = true;
            document.getElementById("m_capacidad").readOnly = true;
            document.getElementById("m_kilometraje").readOnly = false;

            document.getElementById("n_modelo").required=false;
           document.getElementById("m_modelo").required=true; // solo sera requerido si se muestra

            document.getElementById("m_id").value = this.cells[0].innerHTML;
            document.getElementById("m_placa").value = this.cells[1].innerHTML;
            document.getElementById("m_modelo").value = this.cells[2].innerHTML;
            document.getElementById("m_marca").value = this.cells[3].innerHTML;
            document.getElementById("m_capacidad").value = this.cells[4].innerHTML;
          
            document.getElementById("m_kilometraje").value = this.cells[6].innerHTML;

            
            if(this.cells[5].innerText == 'Disponible')
              document.getElementById('m_estado').value = 1;
            else 
            if(this.cells[5].innerText == "No disponible")
              document.getElementById('m_estado').value = 2;
            else
              document.getElementById('m_estado').value = 3; 
          };
      }
}

function agregar(){
  document.getElementById("btnActualizar").disabled = true;
  document.getElementById("btnEliminar").disabled = true;
  document.getElementById("m_estado").disabled = false;

  document.getElementById("btnAgregar").style.visibility = "visible";
  document.getElementById("btnNuevo").style.display = "none";

  document.getElementById("m_placa").readOnly = false;

  document.getElementById("m_modelo").style.display="none";
  document.getElementById("tm_modelo").style.display="none";
  document.getElementById("n_modelo").style.display="inline";

  document.getElementById("m_modelo").required=false;
  document.getElementById("n_modelo").required=true; // solo sera requerido si se muestra

  document.getElementById("tn_modelo").style.display= "inline";

  document.getElementById("m_marca").readOnly = false;
  document.getElementById("m_capacidad").readOnly = false;
  document.getElementById("m_kilometraje").readOnly = false;

  document.getElementById("m_placa").value = "";
  document.getElementById("m_modelo").value = "";
  document.getElementById("m_marca").value = "";
  document.getElementById("m_capacidad").value = "";
  document.getElementById("m_kilometraje").value="";
  document.getElementById('m_estado').value = ""; 
}