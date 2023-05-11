let updatesbtn = document.querySelectorAll('.update')
updatesbtn.forEach(update => {
    update.onclick = () => {
        update.nextElementSibling.style.display = 'inline-block'
        update.style.display = 'none'
        update.closest('.row').querySelectorAll('input').forEach(input => {
            input.removeAttribute('readonly')
        })
    }
})


// function toggleNav() {
//     var navMenu = document.querySelector(".nav-menu-dash");
//     navMenu.classList.toggle("show");

//     var hamburger = document.querySelector(".hamburger");
//     hamburger.classList.toggle("open");
// }

const sidebarToggle = document.querySelector('.hamburger');
const sidebar = document.querySelector('.nav-menu-dash');

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('show');
});