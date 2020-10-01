$(document).ready(function () {
  //Cerrar las alertas automaticamentes
  $('.alert[data-auto-dismiss]').each(function (index, element) {
    const $element = $(element),
      timeout = $element.data('auto-dismiss') || 5000;
    setTimeout(function(){
      $element.alert('close');
    }, timeout);
  })
  //Tooltips
  $('body').tooltip({
    trigger: 'hover',
    selector: '.tooltipsC',
    placement: 'top',
    html: true,
    container: 'body'
  })
});//end of ready