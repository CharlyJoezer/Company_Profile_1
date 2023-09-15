$('.see_more_btn').click(function(){
    $('.desc ul').toggleClass('more')
    const statusButton = $(this).attr('status')
    if(statusButton === 'false'){
        $(this).html('Lebih Sedikit')
        $(this).attr('status', 'true')
    }else{
        $(this).html('Lihat Selengkapnya') 
        $(this).attr('status', 'false')
    }

})