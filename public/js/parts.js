$(document).ready(function () {
    sendRequestParts();
});
$('.input_search').on('keypress', function(e){
    const value = $(this).val()
    if(e.key === 'Enter'){
        sendRequestParts(`/parts?search=${value}`)
    }
})
async function sendRequestParts(url = "/parts") {
    $(".see_more span").removeAttr("onclick");
    $(".list_parts").html(`
        <div style="text-align:center;width:100%;">Memuat...</div>
    `)
    const request = await fetch(url, {
        method: "GET",
    });
    const response = await request.json();
    if(request.status === 400){
        $(".message_invalid_search").html(`*${response.message.search[0]}`)
        $(".list_parts").html('')
    }else if(request.status === 500){
        $(".message_invalid_search").html('*Terjadi Kesalahan Pada Server!')
        $(".list_parts").html('')
    }
    const data = response.data;
    const parts = response.data.data;
    $(".list_parts").html('')
    parts.forEach((i) => {
        $(".list_parts").append(
            `<div class="parts_item" data-aos="flip-up" data-aos-delay="300" data-aos-duration="500">
                <div class="image">
                    <img src="/image/parts/${i.gambar}" alt="${i.nama}">
                </div>
                <div class="desc">
                    <div class="name">${i.nama}</div>
                </div>
            </div>`
        );
    });
    $(".see_more").html(
        `
        <span ${
            data.prev_page_url
                ? `onclick="sendRequestParts('${data.prev_page_url}')" class="prev-parts-active"`
                : 'class="prev-parts"'
        } > &laquo; </span>
            <span> ${data.current_page} </span>
        <span ${
            data.next_page_url
                ? `onclick="sendRequestParts('${data.next_page_url}')" class="next-parts-active"`
                : 'class="next-parts"'
        } > &raquo; </span>
    `
    );
    $(".see_more_range").html(
        `Menampilkan Halaman ${data.current_page} dari ${data.last_page}`
    );
    if(parts.length <= 0){
        $(".list_parts").html('Parts Tidak Ditemukan!')
    }
}
