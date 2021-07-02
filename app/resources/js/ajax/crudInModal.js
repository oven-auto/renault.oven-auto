$(document).ready(function(){
	
	var modal = $('#mainModal')

	

	$(document).on('click', '.motor-control', function(){
		var me = $(this)
		var url = $(this).attr('data-url')
		var method = me.attr('data-method')
		
		var parameters = {}
		modal.find('input').each(function(){
			parameters[$(this).attr('name')] = $(this).val()
		})

		if(method == 'post')
			axios.post(url,parameters).then(function(response){
				if(response.data.success == true)
					showModal(response.data)
			}).catch(function(error){
				console.log(error)
			})

		if(method == 'patch')
			axios.patch(url,parameters).then(function(response){
				if(response.data.success == true)
					showModal(response.data)
			}).catch(function(error){
				console.log(error)
			})

		if(method == undefined)
			axios.get(url).then(function(response){
				if(response.data.success == true)
					showModal(response.data)
			}).catch(function(error){
				console.log(error)
			})
	})
})