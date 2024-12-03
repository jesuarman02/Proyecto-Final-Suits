
const cerrar_sesion = () =>{
    let data = new FormData();
    data.append("metodo","cerrar_sesion");
    fetch("./app/controller/login.php",{
        method:"POST",
        body:data
    })
    .then(respuesta => respuesta.json())
    .then(respuesta => {
        swal.fire({
            title: "Has Cerrado Sesion",
            text: respuesta[1],
            icon: "success",
            buttons: "Aceptar",
            closeOnClickOutside: false,
            closeOnEsc: false,
            value: true,
            buttons: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'inicio'; // Asegúrate de que esta ruta sea la correcta
        });
    })
    .catch(error => {
        console.error('Error:', error); // Manejo de errores
    });
}

$("#cerrar_sesion").on('click', (event) => {
    event.preventDefault(); // Prevenir el comportamiento por defecto del enlace
    cerrar_sesion();
});