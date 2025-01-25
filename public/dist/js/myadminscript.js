$(function(){    
   const navLinks=document.querySelectorAll('.nav-link');
   const navItems=document.querySelectorAll('.nav-item');

   /* EVENT HANDLER */
    function addClassActiveToLink(e){
        navLinks.forEach(links => links.classList.remove('active'));

        e.target.querySelector('.nav-link').classList.add('active');
    }
   /* ADD EVENT LISTENER */
   if(navItems!=''){
    navItems.forEach(item => item.addEventListener('click',addClassActiveToLink))
   }   


     /* PROCESS USER DEPOSIT */
     $("#adminCreateUserForm").on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
               
        $.ajax({           
            url:$(this).attr('action'),
            type:'POST',
            dataType:'json',
            data:new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            beforeSend:function(){
                $('.adminCreateUserFormResponse').html('');
            },

            success: function(response){
                if(response.status==1){
                    $("#adminCreateUserForm")[0].reset();  
                    $('.adminCreateUserFormResponse').append('<p class="alert alert-success">'+response.result+'</p>');                                                                                                                                                                                                        
                }else{                       
                    $.each(response.error_message,function(key,value){
                        $('.adminCreateUserFormResponse').append('<p class="alert alert-danger">'+value+'</p>');
                    });                 
                }
            }
        })
    })

    $("#adminFundAllForm").on('submit',function(e){
        e.preventDefault();
        $.ajax({           
            url:$(this).attr('action'),
            type:'POST',
            dataType:'json',
            data:new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            beforeSend:function(){
                $('.adminFundAllResponse').html('');
            },

            success: function(response){
                if(response.status==1){
                    $("#adminFundAllForm")[0].reset();  
                    $('.adminFundAllResponse').append('<p class="alert alert-success">'+response.result+'</p>');                                                                                                                                                                                                        
                }else{                       
                    $.each(response.error_message,function(key,value){
                        $('.adminFundAllResponse').append('<p class="alert alert-danger">'+value+'</p>');
                    });                 
                }
            }
        })
    })

    $("#FundAllPromoForm").on('submit',function(e){
        e.preventDefault();
        $.ajax({           
            url:$(this).attr('action'),
            type:'POST',
            dataType:'json',
            data:new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            beforeSend:function(){
                $('.adminFundAllResponse').html('');
            },

            success: function(response){
                if(response.status==1){
                    $("#FundAllPromoForm")[0].reset();  
                    $('.adminFundAllResponse').append('<p class="alert alert-success">'+response.result+'</p>');                                                                                                                                                                                                        
                }else{                       
                    $.each(response.error_message,function(key,value){
                        $('.adminFundAllResponse').append('<p class="alert alert-danger">'+value+'</p>');
                    });                 
                }
            }
        })
    })

    $("#user_id").change(function(){
        var id = $(this).val();       
        $.ajax({
          url:'/admin/getUserWallets/'+id,
          type:'GET',
          dataType:'json',
          processData:false,
          beforeSend:function(){
            $('#wallet_id').find('option').not(':first').remove();
          },
          success:function(response){
            var len = 0;
             if(response['data'] != null){
                len = response['data'].length;
             }

             if(len > 0){                
                for(var i=0; i<len; i++){

                   var id = response['data'][i].id;
                   var name = response['data'][i].name;

                   var option = "<option value='"+id+"'>"+name+"</option>";

                   $("#wallet_id").append(option); 
                }
             }else{
                var option = "<option value=''>No investor wallet. Create investor wallet.</option>";

                $("#wallet_id").append(option); 
             }

          }
          
        });
    })   

    $("").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:$(this).attr('action'),
            method:'post',
            dataType:'json',
            data:new FormData(this),
            contentType: false,
            cache:false,
            processData: false,
            beforeSend:function(){
                $("#bulkemailFormResponse").html('<p class="alert alert-secondary">Processing...</p>');
            },
            success:function(response){
                if(response.status==1){
                    $("#bulkemailForm")[0].reset(); 
                    $("#bulkemailFormResponse").append('<p class="alert alert-success">'+response.result+'</p>');  
                }else{
                    $("#bulkemailFormResponse").append('<p class="alert alert-danger">'+response.result+'</p>');
                    if(error_message in response){
                        $.each(response.error_message,function(key,value){
                            $("#bulkemailFormResponse").append('<p class="alert alert-danger">'+value+'</p>');
                        })
                    }  
                }
            }
        })
    });
});