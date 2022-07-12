document.addEventListener("DOMContentLoaded", () => {
    let list = document.getElementsByClassName('photo-container__image');
    for(let i = 0; i < list.length; i++)
        list[i].addEventListener('mouseover',
            () => {document.getElementById('zoom-image').src = list[i].src;},
            false);
});
