

// ----------------------------------



const menu = document.querySelector('#mobile-menu');
const menuLinks = document.querySelector('.mobile-nav');
const close = document.querySelector('.close');
const overlay = document.querySelector('.overlay');


menu.addEventListener('click', function() {
    menuLinks.classList.toggle('active')
    $('.overlay').fadeIn()
    $('body').css("position" , "fixed")

})
close.addEventListener('click', function() {
    menuLinks.classList.remove('active')
    $('.overlay').fadeOut(100)
    $('body').css("position" , "relative")
})
overlay.addEventListener('click', function() {
    menuLinks.classList.remove('active')
    $('.overlay').fadeOut(100)
    $('body').css("position" , "relative")
})

// -------------------------------
