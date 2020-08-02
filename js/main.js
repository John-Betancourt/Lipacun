
/******Overrride defauls alertify******/
//alertify.defaults.transition = "slide";
alertify.defaults.theme.ok = "btn btn-primary";
alertify.defaults.theme.cancel = "btn btn-danger";
alertify.defaults.theme.input = "form-control";
/******End overrride defauls alertify******/

$(document).ready(function(){
	$('#navbar').load('navbar.php')
});

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})