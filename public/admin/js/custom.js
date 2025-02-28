$(document).ready(function(){
    //Check admin password is correct or not
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val(); 
        // alert(current_pwd);

        $.ajax({    
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            url: '/admin/check-current-password',
            data:{current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                 $("#verifyCurrentPwd").html("Current Password is Incorrect!");
                } 
                else if(resp=="true"){
                 $("#verifyCurrentPwd").html("Current Password is Correct!");
                    
                }

            }
            // ,error:function(){
            //      alert("Error");
            // }
        });
    });

    //Update Customer details status
    $(document).on("click",".updateCustomerStatus",function(){
        var status = $(this).children("i").attr("status");
        var page_id = $(this).attr("page_id");

        $.ajax({ 
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'post',
            url:'/admin/update-customer-page-status',
            data:{status:status,page_id:page_id},

            success:function(resp){
             if(resp['status']==0){
              $("#page-"+page_id).html("<i class='fas fa-toggle-off' style='color:grey' status='Inactive'></i>");
              }else if(resp['status']==1){
                $("#page-"+page_id).html("<i class='fas fa-toggle-on' status='Active'></i>");
              } 


            },error:function(){
                 alert("Error");
            }
        })
    })
 
    //Confirm Deletion
    $(document).on("click",".confirmDelete",function(){
        var record = $(this).attr('record');
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
                'Your file has been deleted.',
                'success'
            )
            window.location.href='/admin/delete-'+record+"/"+recordid;
        }
       })                           
    });

});