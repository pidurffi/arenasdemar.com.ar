
$(document).ready(function() {
	$('.btnhapus').click(function() {
		var tr = $(this).closest('tr');
		var iterable_id = tr.attr('data-id');
		tr.find('td').each(function(){
			var data_info = $(this).attr('data-info');
			if(data_info) $('#modal-delete .delete-popup-'+data_info).html($(this).html());
		});
		$('#delete-id',iterable_id);
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
