let currentIndex = 0;
const courseBoxes = document.querySelectorAll('.course-box');
const totalCourses = courseBoxes.length;
updateSlider()
function updateSlider() {
    courseBoxes.forEach((box, index) => {
        // Calculate the position based on the current index
        const offset = (index - currentIndex) * 500; // 500 is the width of each course box
        box.style.transform = `translateX(${offset}px)`; // Move boxes based on index
    });
}

document.querySelector('.next').addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % totalCourses; // Loop to start
    updateSlider();
});

document.querySelector('.prev').addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + totalCourses) % totalCourses; // Loop to end
    updateSlider();
});
