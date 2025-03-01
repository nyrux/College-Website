//Family Members Counter 

function animateCounters() {
    const counters = document.querySelectorAll(".member-num");
    counters.forEach(counter => {
        const target = +counter.getAttribute("data-target");
        let count = 0;
        const increment = target / 100; // Adjust speed

        const updateCounter = () => {
            if (count < target) {
                count += increment;
                counter.innerText = Math.ceil(count) + "+"; // Append "+"
                requestAnimationFrame(updateCounter);
            } else {
                counter.innerText = target + "+"; // Ensure it reaches target with "+"
            }
        };

        updateCounter();
    });
}

// Intersection Observer to detect when section enters viewport
const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            observer.unobserve(entry.target); // Stop observing after activation
        }
    });
}, { threshold: 0.5 });

observer.observe(document.querySelector(".member-cont"));
