$('.input_image').change(function(e){
    $('.cover_freeze').css('display', 'block')
    const previewImage = $(this).parent().children()[0]
    console.log(previewImage);
    const inputImage = e.target
    if (inputImage.files && inputImage.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function (e) {
          previewImage.src = `${e.target.result}`
        };
    
        reader.readAsDataURL(inputImage.files[0]);
    } else {
        previewImage.src = ``
    }
    $(this).parent().submit()
})