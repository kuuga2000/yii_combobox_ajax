$(function() {
	//call function modal
	modal();
});
//buat function modal
function modal() {
	$(".btn-x").click(function() {
		$("#myModal").modal('show');
	});
}