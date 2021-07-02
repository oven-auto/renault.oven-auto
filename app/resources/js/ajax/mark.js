$(document).ready(function() {

	var area = $('.marks-block')
	var modal = $('#mainModal')
	var checkedMark = $('.checked-mark')

	$(document).on('click', '#mark-modal-toggle', function() {
        var parameters = {'brand_id' : $(this).closest('form').find('[name="brand_id"]').val()}
		var url = $(this).attr('data-url')

		if(!parameters.brand_id)
		{
			alert('Бренд не выбран')
			return
		}

		getInModal(url, parameters, modal )
	})

	$(document).on('click', '.modal-body .item-mark', function() {
		var me = $(this)
		var markId = me.find('input').val()
		var clone = me.clone()
		//добавление машин в лист (например при создании опции)
		if(area.length) {
			if(area.find('[data-id="'+markId+'"]').length > 0)
				area.find('[data-id="'+markId+'"]').closest('.item-mark').remove()
			else
				area.append(clone)
		//добавление одной машины (наприме создание комплектации)
		} else if(checkedMark.length) {
			clone.find('input').attr('name', 'mark_id')
        	checkedMark.html(clone.html())

        	getInBlock(me.attr('data-url-option'), {'mark_id' : markId}, $('.option-block'))

        	getInBlock(me.attr('data-url-color'), {'mark_id' : markId}, $('.color-block'))
		}
	})
})
