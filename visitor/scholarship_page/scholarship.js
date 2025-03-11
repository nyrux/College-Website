const seeRqsBtn = document.querySelectorAll('.rqs-btn');

const requirementsData = [
    {
        title: "AAA SCHOLARSHIP REQUIREMENTS",
        requirements: [
            "1. 90% Attendance",
            "2. Passed With 75% In All Terminal Exams",
            "3. Timely Payment Of All Dues",
            "4. Clean Disciplinary Record"
        ]
    },
    {
        title: "FULL WAIVER SCHOLARSHIP REQUIREMENTS",
        requirements: [
            "1. Complete 20 hours of community service",
            "2. Submit a personal essay",
            "3. Maintain a GPA of 3.5",
            "4. Provide two recommendation letters"
        ]
    }
];

const createContent = (title, requirements) => `
    <div class="rqs-cont" style="
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    ">
        <div style="
            width: 100%; 
            display: flex;
            justify-content: flex-end;
            padding: 2vh;
        ">
            <i class="fa-solid fa-x"></i>
        </div>
        <div class="rqs-title" style="
            text-align: center;
            text-decoration: underline;
            font-weight: 600;
            text-underline-offset: 5px;
            text-decoration-thickness: 3px;
        ">${title}</div>
        <ul style="padding: 4vh; font-size: .8em;">
            ${requirements.map(req => `<li>${req}</li>`).join('')}
        </ul>
    </div>
`;

seeRqsBtn.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        const poster = btn.parentElement;
        const originalContent = poster.innerHTML;
        poster.innerHTML = createContent(requirementsData[index].title, requirementsData[index].requirements);
        const closeIcon = poster.querySelector('.fa-x');
        closeIcon.addEventListener('click', () => {
            poster.innerHTML = originalContent;
        }, { once: true });
    });
});
