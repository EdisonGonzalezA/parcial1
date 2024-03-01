function init() {
  $("#form_pelicula").on("submit", (e) => {
    GuardarEditar(e);
  });
}

$().ready(() => {
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get(
    "../../controllers/pelicula.controllers.php?op=todos",
    (ListaPelicula) => {
      ListaPelicula = JSON.parse(ListaPelicula);
      $.each(ListaPelicula, (index, pelicula) => {
        html += `<tr>
                    <td>${index + 1}</td>
                    <td>${pelicula.Titulo}</td>
                    <td>${pelicula.Genero}</td>
                    <td>${pelicula.Anio}</td>
                    <td>${pelicula.Director}</td>
        <td>
        <button class='btn btn-primary' onclick='uno(${
          pelicula.ID_pelicula
        })'>Editar</button>
        <button class='btn btn-warning' onclick='eliminar(${
          pelicula.ID_pelicula
        })'>Eliminar</button>
                    `;
      });
      $("#ListaPelicula").html(html);
    }
  );
};

var GuardarEditar = (e) => {
  e.preventDefault();
  var DatosFormularioPelicula = new FormData($("#form_pelicula")[0]);
  var accion = "../../controllers/pelicula.controllers.php?op=insertar";

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
        alert("Se guardo con éxito");
        CargaLista();
        LimpiarCajas();
      } else {
        alert("no se guardo");
      }
    },
  });
};

/*var sucursales = () => {
  return new Promise((resolve, reject) => {
    var html = `<option value="0">Seleccione una opción</option>`;
    $.post(
      "../../controllers/sucursal.controllers.php?op=todos",
      async (ListaSucursales) => {
        ListaSucursales = JSON.parse(ListaSucursales);
        $.each(ListaSucursales, (index, sucursal) => {
          html += `<option value="${sucursal.SucursalId}">${sucursal.Nombre}</option>`;
        });
        await $("#SucursalId").html(html);
        resolve();
      }
    ).fail((error) => {
      reject(error);
    });
  });
};

var roles = () => {
  return new Promise((resolve, reject) => {
    var html = `<option value="0">Seleccione una opción</option>`;
    $.post(
      "../../controllers/rol.controllers.php?op=todos",
      async (ListaRoles) => {
        ListaRoles = JSON.parse(ListaRoles);
        $.each(ListaRoles, (index, rol) => {
          html += `<option value="${rol.idRoles}">${rol.Rol}</option>`;
        });
        await $("#RolId").html(html);
        resolve();
      }
    ).fail((error) => {
      reject(error);
    });
  });
};

var eliminar = () => {};*/

var LimpiarCajas = () => {
  (document.getElementById("Titulo").value = ""),
    (document.getElementById("Genero").value = ""),
    (document.getElementById("Anio").value = ""),
    (document.getElementById("Director").value = ""),
    $("#ModalUsuarios").modal("hide");
};
init();
