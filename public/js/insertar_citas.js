const agregar = () => {
    let data = new FormData();
    data.append("nombre", $("#input-nombre").val());
    data.append("direccion", $("#input-direccion").val());
    data.append("telefono", $("#input-telefono").val());
    data.append("fecha", $("#input-fecha").val());
    data.append("departamento", $("#select-departamento").val());
    data.append("doctor", $("#select-doctor").val());
    data.append("motivo", $("#input-motivo").val());

    if ($("#input-fecha").val() === "") {
        swal.fire({
            title: "Error!",
            text: "El campo fecha no puede estar vacío.",
            icon: "error",
            buttons: "Aceptar",
        });
        return;
    }
    if ($("#input-motivo").val() === "") {
        swal.fire({
            title: "Error!",
            text: "El campo motivo no puede estar vacío.",
            icon: "error",
            buttons: "Aceptar",
        });
        return;
    }
    data.append("metodo", "insertar_datos");
    
    fetch("./app/controller/insertar_citas.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => { 
        if (respuesta[0] == 1) {
            swal.fire({
                title: "Cita Agendada!",
                text: respuesta[1],
                icon: "success",
                buttons: "Aceptar",
            }).then(() => {
                window.location = "usuario_citas";
            });
        } else {
            swal.fire({
                title: "Error!",
                text: respuesta[1],
                icon: "error",
                buttons: "Aceptar",
            });
        }
    });
}

$('#btn-enviar-cita').on('click', () => {
    agregar();
});
