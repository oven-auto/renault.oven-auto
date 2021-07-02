$(document).ready(function() {
    $(document).on('click', '.modal-motor-togle', function() {
        var url = $(this).attr('data-url')
        var parameters = { 'brand_id' : $(document).find('[name="brand_id"]').val() }
        var modal = $('#mainModal')

        getInModal(url, parameters, modal)
    })

    $(document).on('click', '.modal .item-motor', function(){
        var area = $('.checked-motor')
        area.html($(this).html())
    })
})
