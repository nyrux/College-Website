const toastContainer = document.createElement('div');
toastContainer.style.position = 'fixed';
toastContainer.style.top = '20px';
toastContainer.style.left = '20px';
toastContainer.style.zIndex = '1000';
document.body.appendChild(toastContainer);

function createToast(message, duration = 5000) {
    const toast = document.createElement('div');
    toast.className = 'custom-toast'; 
    toast.innerHTML = `
        <div class="toast-content">
            <span class="toast-message">${message}</span>
            <button class="toast-close">&times;</button>
        </div>
    `;
    toastContainer.appendChild(toast);

    const closeButton = toast.querySelector('.toast-close');
    closeButton.addEventListener('click', () => {
        toastContainer.removeChild(toast);
    });

    setTimeout(() => {
        if (toastContainer.contains(toast)) {
            toastContainer.removeChild(toast);
            location.reload();
        }
    }, duration);
}

$(document).ready(function(){
    $('#admission_form').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'admission_submission.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                $('#f-name').val('');
                $('#l-name').val('');
                $('#email').val('');
                $('#ph-num').val('');
                $('#dob').val('');
                window.scrollTo(0,0);
                createToast(response,4000);
            },
            error: function(xhs, status, error){
                console.log(error);
            }
        });
    });
});
