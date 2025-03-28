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
            window.location.href=data.redirectUrl;
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

     // Account Form Validation
    $("#accountForm").submit(function(){
      var formData = $(this).serialize();

      $.ajax({
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       url:'/customer/account',
       type:'post',
       data: formData,
       success:function(data){
         if(data.type=="validation"){
            $.each(data.errors, function (i,error){
                $('#account-'+i).attr('style','color:red');
                $('#account-'+i).html(error);
                setTimeout(function(){
                    $('#account-'+i).css({
                        'display':'none'
                    })
                }, 5000);
            });
          }else if(data.type=="success"){
            $("#account-success").attr('style','color:green');
            $("#account-success").html(data.message);
          }
       },error:function(){
        alert("Error");
       }
      });
    });

     //Update Password Validation
    $("#passwordForm").submit(function(){
      $("#password-success").hide();
      $("#password-error").hide();
      var formData = $(this).serialize();

      $.ajax({
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       url:'/customer/update_password',
       type:'post',
       data: formData,
       success:function(data){
         if(data.type=="validation"){
            $.each(data.errors, function (i,error){
                $('#password-'+i).attr('style','color:red').show();
                $('#password-'+i).html(error).show();
                setTimeout(function(){
                    $('#password-'+i).css({
                        'display':'none'
                    })
                }, 5000);
            });
          }else if(data.type=="incorrect"){
            $("#password-success").hide();
            $("#password-error").attr('style','color:red').show();
            $("#password-error").html(data.message).show();
           
            setTimeout(function(){
              $("#password-error").css({
                  'display':'none'
              })
          }, 5000);

          }else if(data.type=="success"){
            $("#password-success").attr('style','color:green').show();
            $("#password-success").html(data.message).show();
            
            setTimeout(function(){
              $("#password-success").css({
                  'display':'none'
              })
          }, 5000);

          $("#passwordForm")[0].reset();
          }
          

      },error:function(){
        alert("Error");
       }
    });
    });

});