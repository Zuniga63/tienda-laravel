window.addEventListener('load', () => {
  const formDeletes = document.querySelectorAll('.form-delete');
  formDeletes.forEach(formDelete => {
    formDelete.addEventListener('submit', (e) => {
      e.preventDefault();
      Swal.fire({
        title: '¿Estas seguro que deseas eliminar este registro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, ¡eliminalo!'
      }).then((result) => {
        if (result.isConfirmed) {
          // Swal.fire('¡Eliminado!', 'El registro ha sido borrado', 'success');
          ajaxRequest($(formDelete));
        }
      })
    })
  });

  function ajaxRequest(form) {
    // console.log(form.serialize())
    $.ajax({
      url: form.attr('action'),
      type: 'post',
      data: form.serialize(),
      success: function (response) {
        console.log(response);
        if (response.message == 'ok') {
          form.parents('tr').remove();
          Validator.notifications('El registro fue eliminado correctamente', 'Tienda', 'success');
        } else {
          Validator.notifications('El resgistro no pudo ser eliminado, recurso en uso', 'Tienda', 'error');
        }
      },
      error: function(){

      }
    })
  }
})