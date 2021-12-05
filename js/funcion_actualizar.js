window.onload=atributo;

function atributo()
{
    document.getElementById('elm').setAttribute("isvalid","true");
    document.getElementById('actu').setAttribute("isvalid","true");
}

function validar_nombre()
{
    var regex =/^[a-zA-Z\s]*$/
    var isValido = regex.test(document.getElementById('usuario').value);

    if(isValido)
    {
        if(document.getElementById('elm').getAttribute("isvalid")=="true")
        {
            input_good();
            console.log("Input Good")
        }
        else
        {
            input_good();
            console.log("Input bad Else interno")
        }
    }

    else
    {
        input_bad();
        console.log("Input bad Else externo")
    }
}

function input_bad() { //si el imput es incorrecto se llama
    
    
    document.getElementById('elm').style.background="#c24040"
    document.getElementById('elm').setAttribute("isvalid","false");
    document.getElementById('elm').disabled=true
    document.getElementById('elm').textContent="Formato de Texto incorrecto"

    document.getElementById('actu').style.background="#c24040"
    document.getElementById('actu').setAttribute("isvalid","false");
    document.getElementById('actu').disabled=true
    document.getElementById('actu').textContent="Formato de Texto incorrecto"

    console.log("Actualizar="+document.getElementById('actu').getAttribute("isvalid"))
    console.log("Eliminar="+document.getElementById('elm').getAttribute("isvalid"))
}

function input_good (){//si el imput es correcto se llama
    document.getElementById('elm').setAttribute("isvalid","true");
    document.getElementById('elm').style.background="#540357"
    document.getElementById('elm').disabled=false
    document.getElementById('elm').textContent="Eliminar"

    document.getElementById('actu').setAttribute("isvalid","true");
    document.getElementById('actu').style.background="#540357"
    document.getElementById('actu').disabled=false
    document.getElementById('actu').textContent="Actualizar"
    console.log("Actualizar="+document.getElementById('actu').getAttribute("isvalid"))
    console.log("Eliminar="+document.getElementById('elm').getAttribute("isvalid"))
}