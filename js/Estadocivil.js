var url="./../controlador/EstadoCivil.controlador.php";

function Consultar(){
    $.ajax({
         url:url,
         data:{"accion" :"CONSULTAR"},
         type: 'POST',
         dataType:'json'
    }).done(function(response){
        var html = "";
        $.each(response,function(index,data){
           html += "<tr>";
           html +="<td>"+ data.nombreestadocivil +"</td>";
           html += "<td>";
           html += "<button class='btn btn-warning' onclick='ConsultarPoId("+data.codigoestadocivil+");'><span class='fa fa-edit'></span> Modificar</button>"
           html += "<button class='btn btn-danger' onclick='Eliminar("+data.codigoestadocivil+");'><span class='fa fa-trash'></span>Eliminar</button>"
           html +="</td>";
           html += "</tr>";
        });
        document.getElementById("datos").innerHTML= html;
        
    }).fail(function(response){
        console.log(response);
    });
}

function ConsultarporId(codigoestadocivil){
    $.ajax({
        url:url,
        data:{"cod_estado_civil" : codigoestadocivil,"accion" :"CONSULTAR_ID"},
        type:'POST',
        dataType: 'json'
    }).done(function(response){
        document.getElementById('nombre_estado_civil').value= response.nombreestadocivil;
        document.getElementById('cod_estado_civil').value= response.codigoestadocivil;
    }).fail(function(response){
        console.log(response);
    });
}

function Guardar(){
    $.ajax({
        url:url,
        data:retornarDatos("GUARDAR"),
        type:'POST',
        dataType: 'json'
    }).done(function(response){
        if(response== "OK"){
            alert("Datos Guardados con exito"); 
          }else{
           alert(response); 
          }
    }).fail(function(response){
        console.log(response);
    });
}

function Modificar(){
    $.ajax({
        url:url,
        data:{"cod_estado_civil" : codigoestadocivil,"accion" :"MODIFICAR"},
        type:'POST',
        dataType: 'json'
    }).done(function(response){
        if(response== "OK"){
            alert("Datos Guardados con exito"); 
          }else{
           alert(response); 
          }
    }).fail(function(response){
        console.log(response);
    });  
}

function Eliminar(odigoestadociv){
    $.ajax({
        url:url,
        data:{"cod_estado_civil" : codigoestadocivil,"accion" :"ELIMINAR"},
        type:'POST',
        dataType: 'json'
    }).done(function(response){
       if(response== "OK"){
         alert("Datos Guardados con exito"); 
       }else{
        alert(response); 
       }
    }).fail(function(response){
       console.log(response);
    });
}

function Validar(){
    nombreestadocivil=document.getElementById('nombre_estado_civil').value;

    if(nombreestadocivil==""){
        return false;
    }
    return;
}true

function retornarDatos(agregarId, accion){
    
    return{
        "nombre_estado_civil": document.getElementById('nombre_estado_civil').value,
        "accion":accion,
        "cod_estadocivil" : document.getElementById("cod_estado_civil").value,
    }
}