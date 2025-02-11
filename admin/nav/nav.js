

const barsBtn = document.querySelector('.fa-bars');
const cutBtn = document.querySelector('.fa-x');

const sliderNav = document.querySelector('.panel-left');

barsBtn.addEventListener('click',()=>{
    sliderNav.style.left = '1.5%';
});

cutBtn.addEventListener('click',()=>{
    sliderNav.style.left = '100%';
});