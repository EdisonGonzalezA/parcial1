function init() {
  $("#form_pelicula").on("submit", (e) => {
    GuardarEditar(e);
  });
}

var ruta = "../../controllers/pelicula.controllers.php?op=";
$().ready(() => {
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get(ruta + "todos", (ListaPelicula) => {
    ListaPelicula = JSON.parse(ListaPelicula);
    $.each(ListaPelicula, (index, pelicula) => {
      html += `<tr>
                    <td>${index + 1}</td>
                    <td>${pelicula.Titulo}</td>
                    <td>${pelicula.Genero}</td>
                    <td>${pelicula.Anio}</td>
                    <td>${pelicula.Director}</td>
                    <td>${pelicula.Nombre}</td>
        <td>
        <button class='btn btn-primary' onclick='uno(${
          pelicula.ID_pelicula
        })'data-bs-toggle="modal" data-bs-target="#ModalPelicula">Editar</button>
        <button class='btn btn-danger' onclick='eliminar(${
          pelicula.ID_pelicula
        })'>Eliminar</button>
                    `;
    });
    $("#ListaPelicula").html(html);
  });
};

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioPelicula = new FormData($("#form_pelicula")[0]);
  var accion = ruta + "insertar";

  for (var pair of DatosFormularioPelicula.entries()) {
    console.log(pair[0] + ", " + pair[1]);
  }
  $.ajax({
    url: accion,
    type: "post",
    data: DatosFormularioPelicula,
    processData: false,
    contentType: false,
    cache: false,
    success: (respuesta) => {
      console.log(respuesta);
      respuesta = JSON.parse(respuesta);
      if (respuesta == "ok") {
        Swal.fire({
          title: "Pelicula!",
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

var uno = async (ID_pelicula) => {
  await CargaLista();
  document.getElementById("tituloModal").innerHTML = "Actualizar Pelicula";
  $.post(ruta + "uno", { ID_pelicula: ID_pelicula }, (pelicula) => {
    pelicula = JSON.parse(pelicula);
    document.getElementById("ID_pelicula").value = pelicula.ID_pelicula;
    document.getElementById("Titulo").value = pelicula.Titulo;
    document.getElementById("Genero").value = pelicula.Genero;
    document.getElementById("Anio").value = pelicula.Anio;
    document.getElementById("Director").value = pelicula.Director;
  });
};

var eliminar = (ID_pelicula) => {
  Swal.fire({
    title: "Pelicula",
    text: "Esta seguro que desea eliminar la pelicula",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(ruta + "eliminar", { ID_pelicula: ID_pelicula }, (respuesta) => {
        respuesta = JSON.parse(respuesta);
        if (respuesta == "ok") {
          CargaLista();
          Swal.fire({
            title: "Pelicula!",
            text: "Se emliminó con éxito",
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Pelicula!",
            text: "No se elimino con exito",
            icon: "error",
          });
        }
      });
    }
  });
};

var LimpiarCajas = () => {
  document.getElementById("Titulo").value = "";
  document.getElementById("Genero").value = "";
  document.getElementById("Anio").value = "";
  document.getElementById("Director").value = "";
  document.getElementById("tituloModal").innerHTML = "Insertar Usuario";
  $("#ModalPelicula").modal("hide");
};
init();
