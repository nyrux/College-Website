

document.addEventListener('DOMContentLoaded', () => {

    //Hover over the COURSE BOX------------------------------------------------
    const courseBoxes = document.querySelectorAll('.course-box');

    courseBoxes.forEach(box => {
        const courseName = box.querySelector('.course-name');
    
        box.addEventListener('mouseenter', () => {
            courseName.style.transition = 'top 0.5s ease, justify-content 0.3s ease, opacity 0.3s ease';
            courseName.style.top = '0px';
            courseName.style.justifyContent = 'space-around';
        });
    
        box.addEventListener('mouseleave', () => {
            courseName.style.transition = 'top 0.3s ease, justify-content 0.3s ease, opacity 0.3s ease';
            courseName.style.top = '350px';
            courseName.style.justifyContent = 'space-between';
        });
    });


    //Hover over the EXPLORE KIC LIFESTYLE div--------------------------------------
    const exploreBox = document.querySelector('.life-desc-box');
    const angleBtn = document.querySelector('.fa-angle-right');

    exploreBox.style.transition = 'transform 0.4s';
    angleBtn.style.transition = 'transform 0.4s';

    exploreBox.addEventListener('mouseenter', () => {
        exploreBox.style.transform = 'translateY(-25px)';
        angleBtn.style.transform = 'scale(2,2)';
    });

    exploreBox.addEventListener('mouseleave', () => {
        exploreBox.style.transform = 'translateY(0)';
        angleBtn.style.transform = 'scale(1, 1)';
    });


    //Hover over the event images---------------------------------------
    const lifeImages = document.querySelectorAll('.life-img-cont');
    lifeImages.forEach(img => {
    const eventDesc = img.querySelector('.event-desc'); 

    img.addEventListener('mouseenter', () => {
        eventDesc.style.top = '0%';
    });

    img.addEventListener('mouseleave', () => {
        eventDesc.style.top = '100%';
    });
});

    
});
