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

/* hover/click events for students section ------------------------- */
const divs = document.querySelectorAll('.std-vdo-cont');

divs[0].style.width = '60%';
divs[1].style.width = '20%';
divs[2].style.width = '20%';

divs.forEach(div => {
    div.addEventListener('mouseenter', () => {
        divs.forEach(d => {
            d.style.width = '20%';
        });
        div.style.width = '60%';
    });

    div.addEventListener('mouseleave', () => {
        divs[0].style.width = '60%'; 
        divs[1].style.width = '20%'; 
        divs[2].style.width = '20%'; 
    });
});

const stdVideos = document.querySelectorAll('.std-vdo');

stdVideos.forEach(video => {
    const playVideo = () => {
        video.play();
    };

    const pauseVideo = () => {
        video.pause();
        video.currentTime = 0; 
    };

    video.addEventListener('mouseenter', playVideo);
    video.addEventListener('mouseleave', pauseVideo);
    video.addEventListener('click', () => {
        if (video.paused) {
            playVideo(); 
        } else {
            pauseVideo(); 
        }
    });
});


/* Success Stories Image slier ---------------------------------------- */
const successSlides = document.querySelectorAll('.success-slide');
const successLeftBtn = document.querySelector('.success-slide-btn-left');
const successRightBtn = document.querySelector('.success-slide-btn-right');

let currentIndex = 0;

const updateSlides = () => {
    const offset = -currentIndex * 80;
    successSlides.forEach(slide => {
        slide.style.transform = `translateX(${offset}vw)`;
    });
    successLeftBtn.disabled = currentIndex === 0;
    successRightBtn.disabled = currentIndex === successSlides.length - 1;
};

successRightBtn.addEventListener('click', () => {
    currentIndex++;
    if (currentIndex >= successSlides.length) {
        currentIndex = 0;
    }
    updateSlides();
});

successLeftBtn.addEventListener('click', () => {
    currentIndex--;
    if (currentIndex < 0) {
        currentIndex = successSlides.length - 1;
    }
    updateSlides();
});

updateSlides();