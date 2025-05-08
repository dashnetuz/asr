// var userSettings = {
//   Layout: "vertical", // vertical | horizontal
//   SidebarType: "full", // full | mini-sidebar
//   BoxedLayout: true, // true | false
//   Direction: "ltr", // ltr | rtl
//   Theme: "light", // light | dark
//   ColorTheme: "Blue_Theme", // Blue_Theme | Aqua_Theme | Purple_Theme | Green_Theme | Cyan_Theme | Orange_Theme
//   cardBorder: false, // true | false
// };
// Theme Light / Dark
document.getElementById('light-layout').addEventListener('click', function() {
    document.documentElement.setAttribute('data-bs-theme', 'light');
});
document.getElementById('dark-layout').addEventListener('click', function() {
    document.documentElement.setAttribute('data-bs-theme', 'dark');
});

// LTR / RTL Direction
document.getElementById('ltr-layout').addEventListener('click', function() {
    document.documentElement.setAttribute('dir', 'ltr');
});
document.getElementById('rtl-layout').addEventListener('click', function() {
    document.documentElement.setAttribute('dir', 'rtl');
});

// Full / Boxed Layout
document.getElementById('full-layout').addEventListener('click', function() {
    document.querySelector('.page-wrapper').classList.remove('container');
    document.querySelector('.page-wrapper').classList.add('container-fluid');
});
document.getElementById('boxed-layout').addEventListener('click', function() {
    document.querySelector('.page-wrapper').classList.remove('container-fluid');
    document.querySelector('.page-wrapper').classList.add('container');
});

// Sidebar Full / Mini
document.getElementById('full-sidebar').addEventListener('click', function() {
    document.body.setAttribute('data-sidebartype', 'full');
});
document.getElementById('mini-sidebar').addEventListener('click', function() {
    document.body.setAttribute('data-sidebartype', 'mini-sidebar');
});

// Card Border
document.getElementById('card-with-border').addEventListener('click', function() {
    document.querySelectorAll('.card').forEach(function(card) {
        card.classList.remove('shadow');
        card.classList.add('border');
    });
});
document.getElementById('card-without-border').addEventListener('click', function() {
    document.querySelectorAll('.card').forEach(function(card) {
        card.classList.remove('border');
        card.classList.add('shadow');
    });
});

// Color Theme
function handleColorTheme(color) {
    document.documentElement.setAttribute("data-color-theme", color);
}