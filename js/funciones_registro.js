
window.onload=atributo;

function atributo() {
    document.getElementById('input_user').setAttribute("isvalid","true");
    document.getElementById('pass1').setAttribute("isvalid","true");

    document.getElementById('pass2').setAttribute("isvalid","true");
    console.clear();
    console.log("Contraseña1");
    console.log(document.getElementById('pass1').getAttribute("isvalid"));
    console.log("Contraseña2");
    console.log(document.getElementById('pass2').getAttribute("isvalid"));
    console.log("usuario");
    console.log(document.getElementById('input_user').getAttribute("isvalid"));
}



function validar_nombre()
{
    var regex =/^[a-zA-Z\s]*$/
    var isValido = regex.test(document.getElementById('input_user').value);

  
    if(isValido)
    {   if(document.getElementById('pass1').getAttribute("isvalid")=="true"&&document.getElementById('pass2').getAttribute("isvalid")=="true")
        {
        
            good_pass();
            passgood();
            input_good();
           // activar_boton();
            //alert("IF is valid");
        }
        else
        {
           bad_pass();
         // alert("else is valid")
        }
    }
    else
    {
        des_boton();
        input_bad();
       // alert("if externo")
    }
    console.clear();
    console.log("Contraseña1");
    console.log(document.getElementById('pass1').getAttribute("isvalid"));
    console.log("Contraseña2");
    console.log(document.getElementById('pass2').getAttribute("isvalid"));
    console.log("usuario");
    console.log(document.getElementById('input_user').getAttribute("isvalid"));
    
}


function validar_pass()
{
  
    if(document.getElementById('pass1').value===document.getElementById('pass2').value)
    {   
        if(document.getElementById('input_user').getAttribute("isvalid")=="true")
        {   
            passgood()
            good_pass();
        }

        else{
            input_bad();
            passgood();
            des_boton();
        }
   
    }

    else
    {
        passbad();
        bad_pass();
    }
    console.clear();
    console.log("Contraseña1");
    console.log(document.getElementById('pass1').getAttribute("isvalid"));
    console.log("Contraseña2");
    console.log(document.getElementById('pass2').getAttribute("isvalid"));
    console.log("usuario");
    console.log(document.getElementById('input_user').getAttribute("isvalid"));
}


//funciones extras


function input_bad() { //si el imput es incorrecto se llama
    
    
    document.getElementById('input_user').style.background="#c24040"
    document.getElementById('input_user').setAttribute("isvalid","false");
}

function input_good (){//si el imput es correcto se llama
    document.getElementById('input_user').setAttribute("isvalid","true");
    document.getElementById('input_user').style.background="#FFFF"
}

function passgood() { //si las contraseñas coinciden
    document.getElementById('pass1').setAttribute("isvalid","true");
    document.getElementById('pass2').setAttribute("isvalid","true");
}

function passbad()  //si las contraseñas no coinciden
{
   document.getElementById('pass1').setAttribute("isvalid","false");
    document.getElementById('pass2').setAttribute("isvalid","false");
}



/*function activar_boton()
{

    document.getElementById('reg').disabled=false
    document.getElementById('reg').textContent="Registrarse"
    document.getElementById('reg').style.background="#72d192"



}*/

function des_boton()
{

    document.getElementById('reg').disabled=true
    document.getElementById('reg').textContent="Formato de Texto incorrecto"
    document.getElementById('reg').style.background="#c24040"
  
}

function bad_pass()
{
    //document.getElementById('input_user').style.background="#c24040"
    document.getElementById('reg').disabled=true
    document.getElementById('reg').textContent="Contraseñas no coinciden"
    document.getElementById('reg').style.background="#c24040"


}

function good_pass()
{
    document.getElementById('reg').disabled=false
    document.getElementById('reg').textContent="Registrarse"
    document.getElementById('reg').style.background="#72d192"
 

}
