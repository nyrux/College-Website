document.addEventListener("DOMContentLoaded", function () {
    fetch("fetch.php")
        .then(response => response.json())
        .then(data => {
            let notificationContainer = document.createElement("div");
            notificationContainer.classList.add("notification-container");

            data.forEach(item => {
                let notification = document.createElement("div");
                notification.classList.add("notification");

                notification.innerHTML = `
                    <div class="notif-content">
                        <img class="rounded-image" src="../../uploads/${item.image}" alt="User Image">
                        <div class="notif-text">
                            <p>${item.name}</p>
                            <small>${item.datetime}</small>
                        </div>
                    </div>
                    <button class="delete-btn">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                `;

                // Append notification to the container
                notificationContainer.appendChild(notification);

                // Remove notification on delete button click
                notification.querySelector(".delete-btn").addEventListener("click", () => {
                    notification.remove();
                });
            });

            // Append notifications to body
            document.querySelector('.panel-right').appendChild(notificationContainer);
        })
        .catch(error => console.error("Error fetching data:", error));
});
