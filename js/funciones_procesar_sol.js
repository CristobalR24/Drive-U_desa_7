window.onload = function(){
    var modal1=document.getElementById('modalRechazo');
    var modal2=document.getElementById('modalApruebo');

    var activador1=document.getElementById('btnRechazo');
    var activador2=document.getElementById('btnApruebo');
    var cerrar1=document.getElementById('cerrar1');
    var cerrar2=document.getElementById('cerrar2');

    console.log(document.getElementById('modalRechazo'));

    activador1.addEventListener('click',abrirModal1);
    cerrar1.addEventListener('click',cerrarModal1);

    activador2.addEventListener('click',abrirModal2);
    cerrar2.addEventListener('click',cerrarModal2);

    if(document.getElementById('acepto_chofer').options.length == 0 || document.getElementById('acepto_vehiculo').options.length == 0)
     document.getElementById('aceptar').disabled=true;
    else
     document.getElementById('aceptar').disabled=false;

     if(document.getElementById('acepto_chofer').options.length == 0)
       document.getElementById('chof_msg').style.display = "inline";
     else
       document.getElementById('chof_msg').style.display = "none";

     if(document.getElementById('acepto_vehiculo').options.length == 0)
       document.getElementById('vehiculo_msg').style.display = "inline";
     else
       document.getElementById('vehiculo_msg').style.display = "none";


    function abrirModal1(){
        modal1.style.display='block';
    }
    function cerrarModal1(){
        modal1.style.display='none';
    }
    function abrirModal2(){
        modal2.style.display='block';
    }
    function cerrarModal2(){
        modal2.style.display='none';
    }
   }