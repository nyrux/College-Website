const allBtn = document.querySelector('.all-btn');
const newsBtn = document.querySelector('.news-btn');
const eventBtn = document.querySelector('.events-btn');

const newsItems = document.querySelectorAll('.news-box');
const eventItems = document.querySelectorAll('.event-box'); // Ensure this matches your HTML

// Function to reset button styles
const resetButtonStyles = () => {
    allBtn.style.backgroundColor = '#fff';
    allBtn.style.color = '#000';
    allBtn.style.border = '1px solid grey';

    newsBtn.style.backgroundColor = '#fff';
    newsBtn.style.color = '#000';
    newsBtn.style.border = '1px solid grey';

    eventBtn.style.backgroundColor = '#fff';
    eventBtn.style.color = '#000';
    eventBtn.style.border = '1px solid grey';
};

// Function to show all items
const showAll = () => {
    resetButtonStyles();
    allBtn.style.backgroundColor = '#34b314'; // Active color for All button
    allBtn.style.color = '#fff';

    newsItems.forEach(item => {
        item.style.display = 'flex';
    });
    eventItems.forEach(item => {
        item.style.display = 'flex';
    });
};

// Function to show only news items
const showNews = () => {
    resetButtonStyles();
    newsBtn.style.backgroundColor = '#2a5fa5'; // Active color for News button
    newsBtn.style.color = '#fff';

    eventItems.forEach(item => {
        item.style.display = 'none'; // Hide all event items
    });
    newsItems.forEach(item => {
        item.style.display = 'flex'; // Show all news items
    });
};

// Function to show only event items
const showEvents = () => {
    resetButtonStyles();
    eventBtn.style.backgroundColor = '#cfa310'; // Active color for Events button
    eventBtn.style.color = '#fff';

    newsItems.forEach(item => {
        item.style.display = 'none'; // Hide all news items
    });
    eventItems.forEach(item => {
        item.style.display = 'flex'; // Show all event items
    });
};

allBtn.addEventListener('click', showAll);
newsBtn.addEventListener('click', showNews);
eventBtn.addEventListener('click', showEvents);


