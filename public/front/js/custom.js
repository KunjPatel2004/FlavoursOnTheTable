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
});