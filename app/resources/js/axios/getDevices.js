//вернет список оборудования
window.getInBlock = function(url,parameters, area){
    axios.post(url,parameters).then(function(response){
        if(response.data.success == true)
        {
            area.html(response.data.view)
        }
    }).catch(function(error){
        console.log(error)
    })
}

//вернет список брендов
window.getInModal = function(url, parameters, modal) {
    axios.post(url, parameters).then(function(response){
        if(response.data.success == true)
        {
            modal.find('.modal-title').html(response.data.title)
            modal.find('.modal-body').html(response.data.view)
            modal.modal('show')
        }
    }).catch(function(error){
        console.log(error)
    })
}
