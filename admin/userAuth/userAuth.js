function loadstudent(){
    $.ajax({
        url:'fetch.php',
        type:"post",
        data:{for:"student"},
        success:function(response){
            let request = JSON.parse(response);
            document.querySelector('.rqst-cont-std').innerHTML = "";
            if(!request || request.length === 0){
               let html = ` <div class="rqst-box">
                            <div class="rqst-name">No request</div>
                        </div>`;
                        document.querySelector('.rqst-cont-std').innerHTML += html;
            } else{
                request.forEach(element => {
                    let html = `<div class="rqst-box">
                                    <img class="rqst-img" src="../../uploads/${element.image}">
                                    <div class="rqst-name">${element.username}</div>
                                    <div class="rqst-btn-cont">
                                        <button onclick="location.href='../landing/update_requests.php?id=${element.id}&a=accept&form=user&redirect=home'" class="accept-btn">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                        <button onclick="location.href='../landing/update_requests.php?id=${element.id}&a=reject&form=user&redirect=home'" class="reject-btn">
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </div>
                                </div>`;
                    document.querySelector('.rqst-cont-std').innerHTML += html;
                });
            }
        },
        error: function(xhr, status, error){
            console.log(error);
        }
    });
}
function loadteacher(){
    $.ajax({
        url:'fetch.php',
        type:"post",
        data:{for:"teacher"},
        success:function(response){
            let request = JSON.parse(response);
            document.querySelector('.rqst-cont-teacher').innerHTML = "";

            if(!request  | request.length === 0){
               let html = ` <h2 class='text-center'>No request</h2>`;
                        document.querySelector('.rqst-cont-teacher').innerHTML += html;
            } else{
                request.forEach(element => {
                    let html = `<div class="rqst-box">
                            <img class="rqst-img" src="../../uploads/${element.image}">
                            <div class="rqst-name">${element.username}</div>
                            <div class="rqst-btn-cont">
                                <button onclick="location.href='../landing/update_requests.php?id=${element.id}&a=accept&form=user&redirect=home'" class="accept-btn">
                                <i class="fa-solid fa-check"></i>
                            </button>
                            <button onclick="location.href='../landing/update_requests.php?id=${element.id}&a=reject&form=user&redirect=home'" class="reject-btn">
                                <i class="fa-solid fa-x"></i>
                            </button>
                            </div>
                        </div>`;
                    document.querySelector('.rqst-cont-teacher').innerHTML += html;
                });
            }
        },
        error: function(xhr, status, error){
            console.log(error);
        }
    });
}
document.addEventListener('DOMContentLoaded',() => {
        loadstudent();
        loadteacher();
})