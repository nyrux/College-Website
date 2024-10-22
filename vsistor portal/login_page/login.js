const signupLink = document.querySelector('.signup-link');
const signupTab = document.querySelector('.signup-slider');

const loginLink = document.querySelector('.login-link');
const loginTab = document.querySelector('.login-slider');


signupLink.addEventListener('click',()=>{
    signupTab.style.display = 'block';
})

loginLink.addEventListener('click',()=>{
    loginTab.style.display= 'block';
    signupTab.style.display = 'none';
})

