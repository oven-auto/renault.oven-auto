$(document).ready(function(){
    $(document).on('click', '.modal-brand-toggle', function(){

        getInModal($(this).attr('data-url'), '', $('#mainModal'))

    })

    $(document).on('click', '.modal .item-brand', function(){
        var area = $('.checked-brand')
        area.html($(this).html())

        var input = $(this).find('input')
        var url = input.attr('data-url')
        var parameters = {'brand_id' : input.val()}
        var block = $('.devices-block')
        getInBlock(url, parameters, block)
    })
})
