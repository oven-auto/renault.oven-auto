$(document).ready(function(){

	$(document).on('change', '.option-edit [name="brand_id"]', function() {

		if(!brand_id)
		{
			alert('Не выбран бренд')
			return
		}

		getInBlock($(this).attr('data-url'), {'brand_id' : $(this).val()}, $('.devices-block'))
	})

	$(document).on('change', '.device-checkbox-toggle', function() {
		if($(this).prop('checked') == true )
			$(this).closest('.item-checkbox').addClass('bg-warning')
		else
			$(this).closest('.item-checkbox').removeClass('bg-warning').removeClass('bg-dark').removeClass('text-light')
	})
})
