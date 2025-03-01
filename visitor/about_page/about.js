//Family Members Counter 

function animateCounters() {
    const counters = document.querySelectorAll(".member-num");
    counters.forEach(counter => {
        const target = +counter.getAttribute("data-target");
        let count = 0;
        const increment = target / 100;

        const updateCounter = () => {
            if (count < target) {
                count += increment;
                counter.innerText = Math.ceil(count) + "+"; 
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = target + "+"; 
            }
        };

        updateCounter();
    });
}

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

observer.observe(document.querySelector(".member-cont"));

// Our Teachers Slider

document.addEventListener("DOMContentLoaded", function () {
    const sliderScreen = document.querySelector(".slider-screen");
    const leftBtn = document.querySelector(".left-btn");
    const rightBtn = document.querySelector(".right-btn");
    const slides = document.querySelectorAll(".teacher-slides");
    let index = 0;

    function updateSliderPosition() {
        const slideWidth = slides[0].offsetWidth + 5; 
        sliderScreen.scrollTo({ left: index * slideWidth, behavior: "smooth" });
    }

    rightBtn.addEventListener("click", function () {
        if (index < slides.length - 1) {
            index++;
        } else {
            index = 0; 
        }
        updateSliderPosition();
    });

    leftBtn.addEventListener("click", function () {
        if (index > 0) {
            index--;
        } else {
            index = slides.length - 1; 
        }
        updateSliderPosition();
    });
});
