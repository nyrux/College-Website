const signupLink = document.querySelector('.signup-link');
const signupTab = document.querySelector('.signup-slider');

const loginLink = document.querySelector('.login-link');
const loginTab = document.querySelector('.login-slider');

signupLink.addEventListener('click',()=>{
    signupTab.style.display = 'block';
})

loginLink.addEventListener('click',()=>{
    loginTab.style.display= 'block';
    signupTab.style.display = 'none';
})

$(document).ready(function(){
    $('.toast').hide();
    $('#login').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:'login.php',
            type:'POST',
            data:{
                username:$('#username').val(),
                password:$('#password').val()
            },
            success:function(response){
                if(response === "success"){
                    location.href = "../../student/notice/notice.php";
                }else{
                    $('.toast-body').html(response);
                    $('.toast').show();
                    setTimeout(function() {
                        $('.toast').hide();
                    }, 5000);
                }
            },
            error:function(xhs,status,error){
                console.log(error);
            }
        })
    })
    $('#signup').submit(function(event){
        event.preventDefault();
        const formData = new FormData();
        formData.append('username', $('#userName-signup').val());
        formData.append('password', $('#password-signup').val());
        formData.append('email', $('#email-signup').val());
        formData.append('role', $('input[name="role"]:checked').val());
        formData.append('profileImage', $('#profileImage-signup')[0].files[0]);
        $.ajax({
            url:'signup.php',
            type:'POST',
            data: formData,
            processData: false, 
            contentType: false,
            success:function(response){
                if(response === "success"){
                    location.href = "../home_page/home.html";
                }else{
                    $('.toast-body').html(response);
                    $('.toast').show();
                    setTimeout(function() {
                        $('.toast').hide();
                    }, 5000);
                }
            },
            error:function(xhs,status,error){
                console.log(error);
            }
        })
    })
});


