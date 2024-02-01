var modelRender = function(output,instance) {
  $('.admin-model-render').html(output);
  $(instance).modal('show');
  feather.replace();
}
// accept only alphabet
function testInput(event) {
  var value = String.fromCharCode(event.which);
  var pattern = new RegExp(/[a-zåäö ]/i);
  return pattern.test(value);
}
$(document).on('keypress','.alpha',testInput);

function tooltipInitialize() {
  // $("table tr").tooltip({ selector: '[data-toggle="tooltip"]' });
  $('[data-toggle="tooltip"]').tooltip();
}