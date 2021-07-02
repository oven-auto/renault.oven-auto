window.showModal = function(data) {
	var modal = $('#mainModal')
	modal.find('.modal-title').html(data.title)
	modal.find('.modal-body').html(data.view)
	modal.modal('show')
}