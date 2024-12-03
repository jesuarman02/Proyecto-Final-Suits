const validar_campos = (arreglo) =>{
    for(let i = 0; i < arreglo.length; i++){
        if($(`#${arreglo[i]}`).val() == ""){
            swal.fire({
                title:"Error!",
                text: `El campo ${$(`[for=${arreglo[i]}]`).text()} no puede estar vacio!`,
                icon: "warning",
                buttons: "Aceptar"
            });
                return false;
        }
    }
    return true;
}

const iniciar_registro = () =>{
    let data = new FormData();
    data.append("nombre",$("#nombre").val());
    data.append("apellidoPaterno",$("#apellidoPaterno").val());
    data.append("apellidoMaterno",$("#apellidoMaterno").val());
    data.append("direccion",$("#direccion").val());
    data.append("telefono",$("#telefono").val());
    data.append("email",$("#email").val());
    data.append("password",$("#password").val());
    data.append("metodo","iniciar_registro");
    fetch("./app/controller/registro.php",{
        method:"POST",
        body:data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if(respuesta[0] == 1){
            swal.fire({
                title: "Correcto!",
                text: respuesta[1],
                icon: "success",
                buttons: "Aceptar",
                closeOnClickOutside: false,
                closeOnEsc: false,
                value: true,
                buttons: false,
                timer: 1500
            }).then(() => {
                window.location="login";
            });
        }else{
            swal.fire({
                title:"Error!",
                text: respuesta[1],
                icon: "warning",
                buttons: "Aceptar"
            });
        }
    });
}

$("#btn-registrar").on('click',()=>{
    if(validar_campos(["nombre","apellidoPaterno", "apellidoMaterno", "direccion", "telefono", "email", "password"])){
        iniciar_registro();
    }
});