$(".toggle_navbar_items").click(() => {
    $(".navbar_mobile").toggleClass("open active");
    $(".navbar_logo .title").toggleClass("open");
    $(".toggle_navbar_items .toggle_open").toggleClass("closed");
    $(".toggle_navbar_items .toggle_closed").toggleClass("open");
    $(".list_navbar_items").toggleClass("active");
});
