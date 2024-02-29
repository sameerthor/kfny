$(".form-other-txtarea").hide();

$( ".custom-select" ).change(function() {
   var val = $(this).val();
if(val=="other"){
    $(this).parents('.form-group').find(".form-other-txtarea").show();
} else {
    $(this).parents('.form-group').find(".form-other-txtarea").hide();
}
});