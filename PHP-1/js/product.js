function counterMinus()
{
    let value = parseInt(document.forms['ctrl-btns'].counter.value);
    if(value > 1)
        document.forms['ctrl-btns'].counter.value = value - 1;
    if(value == 2)
        document.forms['ctrl-btns'].dec.disabled=true;
}

function counterPlus()
{
    let value = parseInt(document.forms['ctrl-btns'].counter.value);
    document.forms['ctrl-btns'].counter.value = value + 1;
    if(value == 1)
        document.forms['ctrl-btns'].dec.disabled=false;
}

function infoBuy()
{
    let value = parseInt(document.forms['ctrl-btns'].counter.value);
    $.notify('В корзину добавлено ' + value + ' товаров!', {class:'notify_info'});
}

document.addEventListener("DOMContentLoaded", () => {
    /* Устанавливаем обработчики для зума */
    let list = document.getElementsByClassName('photo-container__image');
    for(let i = 0; i < list.length; i++)
        list[i].addEventListener('mouseover',
            () => {document.getElementById('zoom-image').src = list[i].src;
                   document.getElementById('zoom-image').alt = list[i].alt;},
            false);

    /* Устанавливаем обработчики для кнопки плюс */
    document.forms['ctrl-btns'].inc.addEventListener('click',
        counterPlus,
        false);

    /* Устанавливаем обработчики для кнопки минус */
    document.forms['ctrl-btns'].dec.addEventListener('click',
        counterMinus,
        false);

    /* Устанавливаем обработчики для кнопки Купить */
    document.forms['ctrl-btns'].in_shop.addEventListener('click',
        infoBuy,
        false);
});
