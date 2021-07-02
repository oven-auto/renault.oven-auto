$(document).ready(function(){
	var area = $('.color-block')
	var block = $('.main-color')
	
	$(document).on('click', '#add-color-field', function(){
		var clone = block.clone().removeClass('main-color').addClass('sub-color')
		clone.find('label').html('Дополнительный цвет <button class="del-color">Удалить</button>')
		area.append(clone)
	})

	$(document).on('click', '.del-color', function(){
		$(this).closest('.sub-color').remove()
	})
})