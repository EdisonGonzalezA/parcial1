function init() {
  $("#form_actor").on("submit", (e) => {
    GuardarEditar(e);
  });
}

$().ready(() => {
  CargaLista();
});

var CargaLista = () => {
  var html = "";
  $.get("../../controllers/actor.controllers.php?op=todos", (ListaActor) => {
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
      })'>Editar</button>
      <button class='btn btn-warning' onclick='eliminar(${
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
  var accion = "../../controllers/actor.controllers.php?op=insertar";

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
  (document.getElementById("Nombres").value = ""),
    (document.getElementById("Apellidos").value = ""),
    (document.getElementById("Correo").value = ""),
    (document.getElementById("contrasenia").value = ""),
    $("#ModalUsuarios").modal("hide");
};
init();
