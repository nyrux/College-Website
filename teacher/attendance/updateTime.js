function updateDateTime() {
    const newDate = new Date();
    const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const dayName = daysOfWeek[newDate.getDay()];
    const year = newDate.getFullYear();
    const month = String(newDate.getMonth() + 1).padStart(2, '0'); 
    const date = String(newDate.getDate()).padStart(2, '0');
    const formattedDate = `${year}-${month}-${date}`;
    const dayHTML = document.querySelector('.day');
    const fullYearHTML = document.querySelector('.date');
    dayHTML.innerText = dayName;
    fullYearHTML.innerText = formattedDate;
}
updateDateTime();
setInterval(updateDateTime, 60000);