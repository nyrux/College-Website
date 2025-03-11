function loadadmission() {
    $.ajax({
        url: 'fetch_requests.php',
        type: 'POST',
        data: { type: 'admission' },
        success: function(response) {
            let requests = JSON.parse(response);
            console.log(response);
            
            if (!requests || requests.length === 0) {
                let html = `
                    <div class="admission-rqst">
                        <h1 class="text-center">No Data!</h1>
                    </div>
                `;
                document.querySelector('.admission-rqst-cont').innerHTML += html;
            }
            requests.forEach(request => {

                let html = `
                    <div class="admission-rqst">
                         <div class="admission-rqst">
                            <div class="applicant-profile">
                                <img src="../../uploads/${request.image}" class="std-img">
                                <div class="applicant-name">${request.first_name} ${request.last_name}</div>
                                <div class="applicant-email">${request.email}</div>
                            </div>
                            <div class="applicant-detl-cont">
                                <table>
                                    <tr>
                                        <th>SEE Grade</th>
                                        <th>Contact No.</th>
                                        <th>Age</th>
                                    </tr>
                                    <tr>
                                        <td>${request.grade}</td>
                                        <td>${request.phone_number}</td>
                                        <td>${calculateAge(request.dob)}</td>
                                    </tr>
                                </table>
                                <table class="applicant-detl-table">
                                <tr>
                                    <th>Location</th>
                                    <th>Course</th>
                                    <th>Applied At</th>
                                </tr>
                                <tr>
                                    <td>${request.province}</td>
                                    <td>${request.course}</td>
                                    <td>${timeSince(request.submitted_at)}</td>
                                </tr>
                            </table>
                            </div>
                        
                        
                    </div>`;
                document.querySelector('.admission-rqst-cont').innerHTML+=(html);
            });
            
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('std-img')) {
                    if (event.target) { // Check if the element exists
                        event.target.style.transform = event.target.style.transform === 'scale(5)' ? 'scale(1)' : 'scale(5)';
                        event.target.style.position = 'relative';
                        event.target.style.borderRadius = event.target.style.transform === 'scale(1)' ? '50%' : '0';
                        event.target.style.zIndex = event.target.style.zIndex === '100' ? '0' : '100';
                    }
                }
            });
            
        },
        error: function(xhr, status, error){
            console(status+" "+xhr+" ",error);
        }
        
    });
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
function loadstudent() {
    $.ajax({
        url: 'fetch_requests.php',
        type: 'POST',
        data: { type: 'student' },
        success: function(response) {
            let requests = JSON.parse(response);
            if (!requests || requests.length === 0) { 
                let html = `
                    <div class="std-rqst">
                        <h1 class="text-center">No data!</h1>
                    </div>
                `;
                document.querySelector('.std-rqst-cont').innerHTML += html;
            }

            requests.forEach(request => {
                let html = `
                <div class="std-rqst">
                                    <img class="std-img" src="../../uploads/${request.image}">
                                    <div class="std-name">${request.username}</div>
                                    <div class="std-name">${request.email}</div>
                                    <div class="std-name">${request.date}</div>
                                    
                                </div>
                    `;
                    document.querySelector('.std-rqst-cont').innerHTML+=(html);
            });
        }
    });
}

$(document).ready(function() {
    loadadmission();
    loadstudent();
});