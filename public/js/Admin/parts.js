function editPage(slug){
    window.location = `/admin/dashboard/parts/edit-data/${slug}`
}

$(document).ready(function(){
    $('.delete_action').click(function(){
        const slug = $(this).attr('data')
        $('.wrapper_modal_delete').toggleClass('show')
        $('.modal_cancel').click(function(){
            $('.input_slug').val('')
            $('.wrapper_modal_delete').toggleClass('show')
            $(this).off('click')
        })
    
        $('.input_slug').val(slug)
    })
    
    $('.search_input').on('keypress', function(e){
        const value = $(this).val()
        if(e.key === 'Enter'){
            window.location = '/admin/dashboard/parts?search='+value
            $(this).off('keypress')
        }
    })
    $('.button_search_input').on('click',function(e){
        const value = $('.search_input').val()
        window.location = '/admin/dashboard/parts?search='+value
        $(this).off('click')
    })
})