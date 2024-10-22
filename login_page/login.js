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
    $('#signup').submit(function(event){
        event.preventDefault();
        $.ajax({
            url:'signup.php',
            type:'POST',
            data:{
                username:$('#userName-signup').val(),
                password:$('#password-signup').val(),
                email:$('#email-signup').val()
            },
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
