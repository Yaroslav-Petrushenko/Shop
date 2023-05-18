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

let sidebarToggle = document.querySelector('.hamburger');
let sidebarSpan = sidebarToggle.querySelectorAll('span');
let sidebar = document.querySelector('.nav-menu-dash');

// sidebarToggle.addEventListener('click', () => {
//     sidebar.classList.toggle('show');
//     sidebarSpan.classList.toggle('show');
// });
sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('show');
    sidebarSpan.forEach(span => span.classList.toggle('open'));
});
