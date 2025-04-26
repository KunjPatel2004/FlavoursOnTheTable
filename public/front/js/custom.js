$(document).ready(function (){
 
  setTimeout(function() {
    $("#success-alert").fadeOut("slow");
  }, 3000); // 3000ms = 3 seconds

  window.addEventListener("pageshow", function(event){
    if(event.persisted){
        location.reload();
    }
  });

  
    $("#registerForm").submit(function(){
      var formData = $("#registerForm").serialize();

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
       url:'/customer/update_account',
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
            setTimeout(function(){
              $('#account-success').css({
                  'display':'none'
              })
          }, 5000);
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

    $(document).on("click",".delete-address",function(){
      var recordid = $(this).attr('recordid');
     Swal.fire({
      title:'Are you sure?',
      text:"You won't be able to revert this!",
      icon:'warning',
      showCancelButton:true,
      confirmButtonColor:'#3085d6',
      cancelButtonColor:'#d33',
      confirmButtonText:'Yes,  delete it!',
     }).then((result) =>{
      if(result.isConfirmed){
          Swal.fire(
              'Deleted!',
              'Your address has been deleted.',
              'success'
          )
          window.location.href='/customer/delete-address/' + recordid;
       }
      })                           
    });


    $("#cookForm").submit(function(){
      var formData = $("#cookForm").serialize();

    $.ajax({
       headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
       url:'/cook/register',
       type:'post',
       data: formData,
       success:function(data){
         if(data.type=="validation"){
            $.each(data.errors, function (i,error){
                $('#cook-'+i).attr('style','color:red');
                $('#cook-'+i).html(error);
                setTimeout(function(){
                    $('#cook-'+i).css({
                        'display':'none'
                    })
                }, 5000);
            });
          }else if(data.type=="success"){
            window.location.href = data.redirectUrl; 

          }
       },error:function(){
        alert("Error");
       }
    });
    });
});