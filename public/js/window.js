function hover(u) {
    let btn = document.querySelector('.link_')
        //btn.href = "somelink url"

}

function hide() {
    let card = document.querySelector('.card')
    $(card).hide(500)
    let iframe = document.querySelector('.iframe')
    $(iframe).show(500)
    let btn = document.querySelector('.btn_')
    $(btn).show(2000)
    console.log("cargando");
}

function hide_iframe() {
    let iframe = document.querySelector('.iframe')
    $(iframe).hide(500)
    let btn = document.querySelector('.btn_')
    $(btn).hide(500)
    let card = document.querySelector('.card')
    $(card).show(500)
}

let iframe = document.querySelector('.iframe')
$(iframe).load(function() {
    console.log($(this).val());
});