$(document).ready(function (){

    // Register Form Validation
    $("#registerForm").submit(function(){
      var formData = $("#registerForm").serialize();
    //   alert(formData); return false;
    $.ajax({
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       url:'/customer/register',
       type:'post',
       data: formData,
       success:function(data){
         if(data.type=="validation"){
            $.each(data.errors, function (i,error){
                $('#register-'+i).attr('style','color:red');
                $('#register-'+i).html(error);
                setTimeout(function(){
                    $('#register-'+i).css({
                        'display':'none'
                    })
                }, 5000);
            });
          }else if(data.type=="success"){
            window.location.href= data.redirectUrl;
          }
       },error:function(){
        alert("Error");
       }
    });
    });


    //Login Form Validation
    $("#loginForm").submit(function(){
      var formData = $(this).serialize();

      $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url:'/customer/login',
        type:'post',
        data:formData,
        success:function(response){
          if(response.type=="error"){
            $.each(response.errors, function (i,error){
              $('.login-'+i).attr('style','color:red');
              $('.login-'+i).html(error);
              setTimeout(function(){
                  $('.login-'+i).css({
                      'display':'none'
                  })
              }, 5000);
          });
          }else if(response.type=="incorrect"){
            $("#login-error").attr('style','color:red');
            $("#login-error").html(response.message);
          }else if(response.type=="success"){
            window.location.href=response.redirectUrl;
          }
        },error:function(){
          alert("Error");
        }
      })
    });
});