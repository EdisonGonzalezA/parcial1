function init() {
  $("#form_actor").on("submit", (e) => {
    GuardarEditar(e);
  });
}

var ruta = "../../controllers/actor.controllers.php?op=";
$().ready(() => {
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get(ruta + "todos", (ListaActor) => {
    ListaActor = JSON.parse(ListaActor);
    $.each(ListaActor, (index, actor) => {
      html += `<tr>
                  <td>${index + 1}</td>
                  <td>${actor.Nombre}</td>
                  <td>${actor.Edad}</td>
                  <td>${actor.Genero}</td>
                  <td>${actor.Nacionalidad}</td>
      <td>
      <button class='btn btn-primary' onclick='uno(${
        actor.ID_actor
      })'data-bs-toggle="modal" data-bs-target="#ModalActor">Editar</button>
      <button class='btn btn-danger' onclick='eliminar(${
        actor.ID_actor
      })'>Eliminar</button>
                  `;
    });
    $("#ListaActor").html(html);
  });
};

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioactor = new FormData($("#form_actor")[0]);
  var accion = ruta + "insertar";

  for (var pair of DatosFormularioactor.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }
  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioactor,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        Swal.fire({
          title: "Actor!",
          text: "Se Guardo con exito",
          icon: "success",
        });
        CargaLista();
        LimpiarCajas();
      } else {
        alert("no se guardo");
      }
    },
  });
};

var uno = async (ID_actor) => {
  await CargaLista();
  document.getElementById("tituloModal").innerHTML = "Actualizar Actor";
  $.post(ruta + "uno", { ID_actor: ID_actor }, (actor) => {
    actor = JSON.parse(actor);
    document.getElementById("ID_actor").value = actor.ID_actor;
    document.getElementById("Nombre").value = actor.Nombre;
    document.getElementById("Edad").value = actor.Edad;
    document.getElementById("Genero").value = actor.Genero;
    document.getElementById("Nacionalidad").value = actor.Nacionalidad;
  });
};

var eliminar = (ID_actor) => {
  Swal.fire({
    title: "Actor",
    text: "Esta seguro que desea eliminar el Actor",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(ruta + "eliminar", { ID_actor: ID_actor }, (respuesta) => {
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") {
          CargaLista();
          Swal.fire({
            title: "Actor!",
            text: "Se emliminó con éxito",
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Actor!",
            text: "No se elimino con exito",
            icon: "error",
          });
        }
      });
    }
  });
};

var LimpiarCajas = () => {
  document.getElementById("Nombre").value = "";
  document.getElementById("Edad").value = "";
  document.getElementById("Genero").value = "";
  document.getElementById("Nacionalidad").value = "";
  document.getElementById("tituloModal").innerHTML = "Insertar Actor";
  $("#ModalActor").modal("hide");
};
init();
