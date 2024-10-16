// hover/click event for courses section----------------------------------------------------------
const courseBoxes = document.querySelectorAll('.course-box');
const slideLeftBtn = document.querySelector('.course-btn-left');
const slideRightBtn = document.querySelector('.course-btn-right');

function initDesktopCourses() {
    resetBoxWidths();

    courseBoxes.forEach((box, index) => {
        const aboutCourse = box.querySelector('.about-course');
        aboutCourse.style.transition = 'transform 0.5s ease';
        aboutCourse.style.transform = 'translateY(80%)';

        box.addEventListener('mouseenter', () => {
            adjustBoxWidths(box);
            aboutCourse.style.transform = 'translateY(0%)';
        });

        box.addEventListener('mouseleave', () => {
            resetBoxWidths();
            aboutCourse.style.transform = 'translateY(80%)';
        });
    });
}

function adjustBoxWidths(activeBox) {
    courseBoxes.forEach(box => {
        box.style.transition = 'width 0.5s ease';
        box.style.width = (box !== activeBox) ? '15%' : '50%';
    });
}

function resetBoxWidths() {
    courseBoxes[0].style.width = '40%';
    courseBoxes.forEach((box, index) => {
        box.style.width = (index !== 0) ? '20%' : '40%';
    });
}

function initMobileCourses() {
    let currentIndex = 0;
    const boxWidth = 75; 
    const gap = 4; 

    const updateBoxPositions = (index) => {
        const offset = index * (boxWidth + gap);
        courseBoxes.forEach(box => {
            box.style.transform = `translateX(-${offset}vw)`;
            box.style.transition = 'transform 0.5s ease';
        });
    };

    slideRightBtn.addEventListener('click', () => {
        if (currentIndex < courseBoxes.length - 1) {
            currentIndex++;
            updateBoxPositions(currentIndex);
        }
    });

    slideLeftBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateBoxPositions(currentIndex);
        }
    });

    updateBoxPositions(currentIndex);
}

function handleResize() {
    if (window.innerWidth > 992) {
        initDesktopCourses();
    } else if (window.innerWidth <= 992 && window.innerWidth > 768) {
       
        resetBoxWidths(); 
    } else {
        initMobileCourses();
    }
}


handleResize();
window.addEventListener('resize', handleResize);
// //hover/click events for Life At KIC------------------------------------------------------------

const eventBox = document.querySelectorAll('.life-img-cont');
eventBox.forEach(box => {
    const aboutBox = box.querySelector('.about-event');
    aboutBox.style.transition = 'transform 0.5s ease';  

    addHoverClickEvents(box, aboutBox);
});


function addHoverClickEvents(box, aboutBox) {
    box.addEventListener('mouseenter', () => {
        aboutBox.style.transform = 'translateY(0%)';
    });

    box.addEventListener('mouseleave', () => {
        aboutBox.style.transform = 'translateY(100%)';  
    });

    box.addEventListener('click', () => {
        if (aboutBox.style.transform === 'translateY(0%)') {
            aboutBox.style.transform = 'translateY(100%)';
        } else {
            aboutBox.style.transform = 'translateY(0%)';  
        }
    });
}
