const courseBoxes = document.querySelectorAll('.course-box');
const slideLeftBtn = document.querySelector('.course-btn-left');
const slideRightBtn = document.querySelector('.course-btn-right');
function initDesktopCourses() {
    courseBoxes[0].style.width = '40%';
    courseBoxes[0].style.transition = 'width 0.5s ease';
    courseBoxes.forEach((box, index) => {
        if (index !== 0) {
            box.style.width = '20%';
        }
        const aboutCourse = box.querySelector('.about-course');
        aboutCourse.style.transition = 'transform 0.5s ease';
        aboutCourse.style.transform = 'translateY(80%)';
        box.addEventListener('mouseenter', () => {
            courseBoxes.forEach(b => {
                b.style.transition = 'width 0.5s ease';
                b.style.width = (b !== box) ? '15%' : '50%';
            });
            aboutCourse.style.transform = 'translateY(0%)';
        });
        box.addEventListener('mouseleave', () => {
            resetBoxWidths();
            aboutCourse.style.transform = 'translateY(80%)';
        });
    });
}
function resetBoxWidths() {
    courseBoxes[0].style.width = '40%';
    courseBoxes.forEach((box, index) => {
        if (index !== 0) {
            box.style.width = '20%';
        }
    });
}
function initMobileCourses() {
    let currentIndex = 0;
    const boxWidth = 75;
    const gap = 4;
    slideRightBtn.addEventListener('click', () => {
        if (currentIndex < courseBoxes.length - 1) {
            currentIndex++;
            updateBoxPositions(currentIndex, boxWidth, gap);
        }
    });
    slideLeftBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateBoxPositions(currentIndex, boxWidth, gap);
        }
    });
    slideRightBtn.addEventListener('touchstart', () => {
        if (currentIndex < courseBoxes.length - 1) {
            currentIndex++;
            updateBoxPositions(currentIndex, boxWidth, gap);
        }
    });
    slideLeftBtn.addEventListener('touchstart', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateBoxPositions(currentIndex, boxWidth, gap);
        }
    });
    updateBoxPositions(currentIndex, boxWidth, gap);
}
function updateBoxPositions(currentIndex, boxWidth, gap) {
    const offset = currentIndex * (boxWidth + gap);
    courseBoxes.forEach(box => {
        box.style.transform = `translateX(-${offset}vw)`;
    });
}
if (window.innerWidth > 992) {
    initDesktopCourses();
} else if (window.innerWidth <= 992 && window.innerWidth > 768) {
    slideRightBtn.addEventListener('click', () => {
        courseBoxes.forEach(box => {
            box.style.transform = 'translateX(85vw)';
        });
    });
    slideLeftBtn.addEventListener('click', () => {
        courseBoxes.forEach(box => {
            box.style.transform = 'translateX(0vw)';
        });
    });
} else {
    initMobileCourses();
}
window.addEventListener('resize', () => {
    if (window.innerWidth > 992) {
        initDesktopCourses();
    } else if (window.innerWidth <= 992 && window.innerWidth > 768) {
        slideRightBtn.addEventListener('click', () => {
            courseBoxes.forEach(box => {
                box.style.transform = 'translateX(85vw)';
            });
        });
        slideLeftBtn.addEventListener('click', () => {
            courseBoxes.forEach(box => {
                box.style.transform = 'translateX(0vw)';
            });
        });
    } else {
        initMobileCourses();
    }
});