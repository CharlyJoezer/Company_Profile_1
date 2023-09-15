$(".input_image").change((e) => {
    const inputImage = e.target;
    const previewImage = $(".preview_image");
    if (inputImage.files && inputImage.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.attr("src", e.target.result);
        };
        reader.readAsDataURL(inputImage.files[0]);
    }
});

