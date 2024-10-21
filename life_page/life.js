const eventBox = document.querySelectorAll('.life-img');

eventBox.forEach(box => {
    const aboutBox = box.querySelector('.about-event-cont');

    const showAboutBox = () => {
        aboutBox.style.transform = 'translateY(0%)';
    };

    const hideAboutBox = () => {
        aboutBox.style.transform = 'translateY(100%)';
    };

    box.addEventListener('mouseenter', showAboutBox);
    box.addEventListener('mouseleave', hideAboutBox);

    box.addEventListener('click', () => {
        if (aboutBox.style.transform === 'translateY(0%)') {
            hideAboutBox();
        } else {
            showAboutBox();
        }
    });
});
