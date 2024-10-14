const courseBoxes = document.querySelectorAll('.course-box');


courseBoxes[0].style.width = '40%';
courseBoxes[0].style.transition = 'width 0.5s ease';
courseBoxes.forEach((box, index) => {
    if (index !== 0) {
        box.style.width = '20%'; 
        box.style.transition = 'width 0.5s ease';
    }

    const aboutCourse = box.querySelector('.about-course');

    aboutCourse.style.transition = 'transform 0.5s ease';
    aboutCourse.style.transform = 'translateY(80%)'; 

    box.addEventListener('mouseenter', () => {
        courseBoxes.forEach(b => {
            b.style.transition = 'width 0.5s ease';
            if (b !== box) {
                b.style.width = '15%';
            } else {
                b.style.width = '50%';
            }
        });

        aboutCourse.style.transform = 'translateY(0%)'; 
    });

    box.addEventListener('mouseleave', () => {
        courseBoxes[0].style.width = '40%';
        courseBoxes.forEach((b, index) => {
            if (index !== 0) {
                b.style.width = '20%'; 
            }
        });

        aboutCourse.style.transform = 'translateY(80%)'; 
    });
});
