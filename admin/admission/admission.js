document.addEventListener("DOMContentLoaded", loadSubmissions);

function loadSubmissions() {
    let tableBody = document.querySelector(".rqst-cont");

    if (!tableBody) {
        console.error("Error: .rqst-cont element not found!");
        return; // Stop execution if the element does not exist
    }

    fetch("load_submissions.php")
        .then(response => response.json())
        .then(data => {
            tableBody.innerHTML = ""; // Clear the container
            console.log(data);

            if (!data || data.length === 0) {
                tableBody.innerHTML = `
                    <div class="rqst-box">
                        <h1 class="text-center">0 Requests</h1>
                    </div>
                `;
            } else {
                data.forEach(submission => {
                    let row = `
                        <div class="rqst-box">
                            <div class="std-profile">
                                <img src="../../uploads/${submission.image}" class="std-img">
                                <div class="std-name">${submission.first_name} ${submission.last_name}</div>
                            </div>
                            <table class="std-detl-table">
                                <tr>
                                    <th>SEE Grade</th>
                                    <th>Contact No.</th>
                                    <th>Age</th>
                                </tr>
                                <tr>
                                    <td>${submission.grade}</td>
                                    <td>${submission.phone_number}</td>
                                    <td>${calculateAge(submission.dob)}</td>
                                </tr>
                            </table>
                            <table class="std-detl-table">
                                <tr>
                                    <th>Location</th>
                                    <th>Course</th>
                                    <th>Applied At</th>
                                </tr>
                                <tr>
                                    <td>${submission.province}</td>
                                    <td>${submission.course}</td>
                                    <td>${timeSince(submission.submitted_at)}</td>
                                </tr>
                            </table>
                            <div class="action-btn-cont">
                                <button onclick="location.href='../landing/update_requests.php?id=${submission.id}&a=reject&form=admission&redirect=admission'" class="reject-btn">
                                    <i class="fa-solid fa-x"></i>
                                </button>
                                <button onclick="location.href='../landing/update_requests.php?id=${submission.id}&a=accept&form=admission&redirect=admission'" class="accept-btn">
                                    <i class="fa-solid fa-check"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    tableBody.innerHTML += row;
                });
            }

            // Image Zoom Effect
            document.querySelectorAll('.std-img').forEach(img => {
                img.addEventListener('click', event => {
                    let target = event.target;
                    target.style.transform = target.style.transform === 'scale(5)' ? 'scale(1)' : 'scale(5)';
                    target.style.position = 'relative';
                    target.style.borderRadius = target.style.borderRadius === '0' ? '50%' : '0';
                    target.style.zIndex = target.style.zIndex === '100' ? '0' : '100';
                });
            });
        })
        .catch(error => console.error("Error fetching submissions:", error));
}

function timeSince(startDateString) {
    const startDate = new Date(startDateString);
    const now = new Date();
    
    const seconds = Math.floor((now - startDate) / 1000);
    if (seconds < 60) return `${seconds} second${seconds === 1 ? '' : 's'} ago`;

    const minutes = Math.floor(seconds / 60);
    if (minutes < 60) return `${minutes} minute${minutes === 1 ? '' : 's'} ago`;

    const hours = Math.floor(minutes / 60);
    if (hours < 24) return `${hours} hour${hours === 1 ? '' : 's'} ago`;

    const days = Math.floor(hours / 24);
    if (days < 30) return `${days} day${days === 1 ? '' : 's'} ago`;

    const months = Math.floor(days / 30);
    return `${months} month${months === 1 ? '' : 's'} ago`;
}


function calculateAge(birthDateString) {
    const birthDate = new Date(birthDateString);
    const today = new Date();
    
    let age = today.getFullYear() - birthDate.getFullYear();
    const monthDifference = today.getMonth() - birthDate.getMonth();
    const dayDifference = today.getDate() - birthDate.getDate();

    if (monthDifference < 0 || (monthDifference === 0 && dayDifference < 0)) {
        age--;
    }

    return age;
}