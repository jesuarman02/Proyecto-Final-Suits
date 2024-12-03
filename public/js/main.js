const consulta = () => {
    let data = new FormData();
    data.append("metodo", "obtener_datos");
    fetch("./app/controller/insertar_citas.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        let contenido = ``,
            i = 1;
        respuesta.map(cita => {
            contenido += `
                <tr>
                    <th>${i++}</th>
                    <td>${cita['nombre']}</td>
                    <td>${cita['telefono']}</td>
                    <td>${cita['fecha']}</td>
                    <td>${cita['departamento']}</td>
                    <td>${cita['doctor']}</td>
                    <td>${cita['motivo']}</td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="precargar(${cita['id']})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button type="button" class="btn btn-danger" onclick="eliminar(${cita['id']})"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            `;
        });
        $("#contenido_citas").html(contenido);
        $('#myTable').DataTable();
    });
};

// Precargar datos en el formulario de edición
const precargar = (id) => {
    let data = new FormData();
    data.append("id", id);
    data.append("metodo", "precargar_datos");
    fetch("./app/controller/insertar_citas.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        $("#edit_nombre").val(respuesta['nombre']);
        $("#edit_direccion").val(respuesta['direccion']);
        $("#edit_telefono").val(respuesta['telefono']);
        $("#edit_fecha").val(respuesta['fecha']);
        $("#edit_departamento").val(respuesta['departamento']);
        $("#edit_doctor").val(respuesta['doctor']);
        $("#edit_motivo").val(respuesta['motivo']);
        $("#id_cita_act").val(respuesta['id']);
        $("#editarModal").modal('show');
    });
};

// Actualizar cita
const actualizar = () => {
    let data = new FormData();
    data.append("id", $("#id_cita_act").val());
    data.append("nombre", $("#edit_nombre").val());
    data.append("direccion", $("#edit_direccion").val());
    data.append("telefono", $("#edit_telefono").val());
    data.append("fecha", $("#edit_fecha").val());
    data.append("departamento", $("#edit_departamento").val());
    data.append("doctor", $("#edit_doctor").val());
    data.append("motivo", $("#edit_motivo").val());
    data.append("metodo", "actualizar_datos");
    fetch("./app/controller/insertar_citas.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0] == 1) {
            swal("Correcto!", respuesta[1], "success");
            consulta();
            $("#editarModal").modal('hide');
        } else {
            swal("Error!", respuesta[1], "error");
        }
    });
};

// Agregar cita
const agregar = () => {
    let data = new FormData();
    data.append("nombre", $("#nombre").val());
    data.append("direccion", $("#direccion").val());
    data.append("telefono", $("#telefono").val());
    data.append("fecha", $("#fecha").val());
    data.append("departamento", $("#departamento").val());
    data.append("doctor", $("#doctor").val());
    data.append("motivo", $("#motivo").val());
    data.append("metodo", "insertar_datos");
    fetch("./app/controller/insertar_citas.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        if (respuesta[0] == 1) {
            swal("Correcto!", respuesta[1], "success");
            consulta();
            $("#agregarModal").modal('hide');
        } else {
            swal("Error!", respuesta[1], "error");
        }
    });
};

// Eliminar cita
const eliminar = (id) => {
    swal({
        title: "Advertencia!",
        text: "¿Quieres eliminar esta cita?",
        icon: "warning",
        buttons: ["Cancelar", "Aceptar"],
    }).then((opcion) => {
        if (opcion) {
            let data = new FormData();
            data.append("id", id);
            data.append("metodo", "eliminar_datos");
            fetch("./app/controller/insertar_citas.php", {
                method: "POST",
                body: data
            }).then(respuesta => respuesta.json())
            .then(respuesta => {
                if (respuesta[0] == 1) {
                    swal("Correcto!", respuesta[1], "success");
                    consulta();
                } else {
                    swal("Error!", respuesta[1], "error");
                }
            });
        }
    });
};

// Eventos
$('#btn_actualizar').on('click', actualizar);
$('#btn_agregar').on('click', agregar);

// Inicializar consulta
consulta();
