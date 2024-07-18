window.addEventListener('DOMContentLoaded',function(){
    const elPopup = document.querySelector('[data-js-il-pop-up]');
    this.setTimeout(function(){
        elPopup.classList.replace('il-pop-up--ferme','il-pop-up--ouvert')
    },1000)
});