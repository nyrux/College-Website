document.addEventListener("DOMContentLoaded", loadSubmissions);

function loadSubmissions() {
    fetch("load_submissions.php")
        .then(response => response.json())
        .then(data => {
            let tableBody = document.getElementById("submissionBody");
            tableBody.innerHTML = ""; // Clear any existing rows
            var i = 1;
            data.forEach(submission => {
                let row = document.createElement("tr");
                
                row.innerHTML = `
                    <td>${i}</td>
                    <td><a href="../../visitor/uploads/${submission.image}"><img width='100' height='100' src="../../visitor/uploads/${submission.image}"></a></td>
                    <td>${submission.first_name}</td>
                    <td>${submission.last_name}</td>
                    <td>${submission.email}</td>
                    <td>${submission.phone_number}</td>
                    <td>${submission.province}</td>
                    <td>${submission.course}</td>
                    <td>${submission.dob}</td>
                    <td>${submission.grade}</td>
                    <td>${submission.submitted_at}</td>
                    <td>
                        <button class="accept-btn" onclick="updateStatus(${submission.id}, 'accepted')">Accept</button>
                        <button class="decline-btn" onclick="updateStatus(${submission.id}, 'declined')">Decline</button>
                    </td>
                `;
                i++;
                tableBody.appendChild(row);
            });
        });
}

function updateStatus(id, status) {
    fetch("update_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id, status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Submission has been ${status}`);
            loadSubmissions(); // Refresh the table
        } else {
            alert("Error updating status.");
        }
    });
}
