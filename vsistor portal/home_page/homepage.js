
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