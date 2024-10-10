//Scroll Visibility Animation
const animationElements = document.querySelectorAll('.why-kantipur * , .welcome-wrapper *, .msg-from-cont *');
console.log(animationElements);

animationElements.forEach(ele => {
    if (isInView(ele)) {
        ele.classList.add('visible');
    }
});

function debounce(func, delay) {
    let timeout;
    return function(...args) {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), delay);
    };
}

document.addEventListener('scroll', debounce(() => {
    animationElements.forEach(ele => {
        if (isInView(ele)) {
            ele.classList.add('visible');
        }
    });
}, 100));

function isInView(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.bottom > 0 &&
        rect.top < (window.innerHeight - 150 || document.documentElement.clientHeight - 150)
    );
}
