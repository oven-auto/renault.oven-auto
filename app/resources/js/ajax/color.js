$(document).ready(function() {
	
	var area = $('.color-area')
	var modal = $('#mainModal')
	var fileField = '<div class="custom-file">' +
				    '<input type="file" class="custom-file-input color-file" name="">'+
				    '<input type="hidden" name="" class="color-hidden">'+
				    '<label class="custom-file-label" for="validatedCustomFile"></label>'+
				    '<div class="invalid-feedback"></div>'+
					'</div>'

	$(document).on('click', '#color-palette', function() {
		var me = $(this)
		var url = me.attr('data-url')
		var brand_id = $('[name="brand_id"]').val()
		var parameters = {
			brand_id : brand_id
		}

		axios.post(url,parameters).then(function(response){
			if(response.data.success == true)
			{
				modal.find('.modal-title').html(response.data.title)
				modal.find('.modal-body').html(response.data.view)
				area.find('.color-choice').each(function() {
					var meId = $(this).attr('data-color-id')
					modal.find('[data-color-id="'+meId+'"]').find('.color-wraper').addClass('gray-wrapper')
				})
				modal.modal('show')
			}
		}).catch(function(error){
			console.log(error)
		})
	})

	$(document).on('click', '.modal-body .color-choice', function() {
		var me = $(this)
		var meId = me.attr('data-color-id')
		var inAreaExsist = area.find('[data-color-id="'+meId+'"]')
		if(inAreaExsist.length)
		{
			inAreaExsist.remove()
			me.find('.color-wraper').removeClass('gray-wrapper')
		}
		else
		{
			var clone = me.clone()
			clone.find('.color-wraper').append(fileField)
			clone.find('.color-file').attr('name','colors['+meId+'][img]')
			clone.find('.color-hidden').attr('name','colors['+meId+'][id]').val(meId)
			me.find('.color-wraper').addClass('gray-wrapper')
			area.append(clone)
		}
	})

	function readURL(input) {
		console.log(input.files)
	    if (input.prop('files') && input.prop('files')[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	        	var imgBlock = input.closest('.color-wraper').find('.color-icon')
	        	imgBlock.removeClass('color-icon')
	            var img = '<img style="width: 100%;">'
	            imgBlock.append(img)
	            imgBlock.find('img').attr('src', e.target.result);
	        };

	        reader.readAsDataURL(input.prop('files')[0]);
	    }
	}

	$(document).on('change', '.color-area input', function(){
	    readURL($(this));
	});
})