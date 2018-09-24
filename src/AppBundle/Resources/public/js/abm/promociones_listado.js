/*$(document).ready( function (){
      $('#table_cust').DataTable({
        "paging": falta,
        "lengthChange": true,
        "searching": false,
        "ordering": false,
        "info": false,
        "responsive": true,
        "autoWidth": true,
        "pageLength": 20,
        /*"ajax": {
          "url": "data.php",
          "type": "POST"
        },*/
        /*"columns": [
        { "data": "urutan" },
        { "data": "name" },
        { "data": "gender" },
        { "data": "country" },
        { "data": "phone" },
        { "data": "button" },
        ]*/
  /*    });
    });
*/

$(document).ready(function() {
	$('.btnhapus').click(function() {
		var tr = $(this).closest('tr');
		var promo_id = tr.attr('data-id');
		var promo_nombre = tr.find('td[data-info="nombre"]').html();
		var promo_precio = tr.find('td[data-info="precio"]').html();
		$('#modal-delete .delete-promocion-nombre').html(promo_nombre);
		$('#modal-delete .delete-promocion-precio').html(promo_precio);
		$('#delete-id').val(promo_id);
		$('#btn-delete').attr('data-url-delete',$(this).attr('data-url-delete'));
		$('#modal-delete').modal('show');
	});
	$('#btn-delete').click(function() {
		window.location=$(this).attr('data-url-delete');
	});
	$('#btnadd').click(function(){
		window.location = $(this).attr('data-href');
	});
	$('.btnedit').click(function(){
		window.location=$(this).attr('data-url-edit');
	});
	
	
});
