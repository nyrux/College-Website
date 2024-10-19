const navBars = document.querySelector('.fa-bars');
const nav = document.querySelector('nav');
const dropDownNav = document.querySelector('.nav-dropdown');


const initialNavHeight = nav.style.height;

navBars.addEventListener('click', toggleNav);

function toggleNav() {
    if (navBars.classList.contains('fa-bars')) {
        navBars.classList.remove('fa-bars');
        navBars.classList.add('fa-x');
        nav.style.height = '100vh';
        dropDownNav.style.display = 'grid';
        
        setTimeout(() => {
            dropDownNav.style.opacity = 1;
        }, 200);
    } else {
        navBars.classList.remove('fa-x');
        navBars.classList.add('fa-bars');
        nav.style.height = initialNavHeight; 
        dropDownNav.style.opacity = 0;
        setTimeout(() => {
            dropDownNav.style.display = 'none';
        }, 300);
    }
}


if (navigator.userAgent.includes("Chrome")) {
    const nav = document.querySelector('nav');
    nav.style.backdropFilter = 'blur(5px)';
}
