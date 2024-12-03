const validar_campos = (arreglo) =>{
    for(let i = 0; i < arreglo.length; i++){
        if($(`#${arreglo[i]}`).val() == ""){
            swal.fire({
                title:"Error!",
                text: `El campo ${$(`[for=${arreglo[i]}]`).text()} no puede estar vacio`,
                icon: "warning",
                buttons: "Aceptar"
            });
            return false;
        }
    }
    return true;
}

const iniciar_sesion = () =>{
    let data = new FormData();
    data.append("email",$("#email").val());
    data.append("password",$("#password").val());
    data.append("metodo","iniciar_sesion");
    fetch("./app/controller/login.php",{
        method:"POST",
        body:data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if(respuesta[0] == 1){
            swal.fire({
                title: "Bienvenido",
                text: respuesta[1],
                icon: "success",
                buttons: "Aceptar",
                closeOnClickOutside: false,
                closeOnEsc: false,
                value: true,
                buttons: false,
                timer: 1500
            }).then(() => {
                // Verificamos si el mensaje incluye "Redirigiendo a administrador"
            if (respuesta[1].includes("administrador")) {
                window.location = "administrador";  // Redirige a la vista de administrador
            } else {
                window.location = "inicio";  // Redirige a la vista general
            }
        });
        }else{
            swal.fire({
                title: "Intenta Nuevamente!",
                text: respuesta[1],
                icon: "warning",
                buttons: "Aceptar",
            })
        }
    });
}

$("#btn-iniciar").on('click',()=>{
    if(validar_campos(["email","password"])){
        iniciar_sesion();
    }
});