window.addEventListener('load', () => {
  $('.menu_rol').on('change', function () {
    let data = {
      menu_id : $(this).data('menuid'),
      rol_id : $(this).val(),
      _token : $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
      data.estado = 1;
    } else {
      data.estado = 0;
    }
    ajaxRequest('/admin/menu-rol', data);
  })
})

function ajaxRequest(url, data) {
  $.ajax({
    url,
    type: 'POST',
    data,
    success: function (response) {
      Validator.notifications(response.message, 'Sistema', 'success');
    }
  })
}