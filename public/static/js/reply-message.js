$("#reply-message").on('submit',(function(e) {
    e.preventDefault();
    // App.showModal();
    var formData = new FormData(this)
    // alert('ok');

    $.ajax({
        url: "/submit_message/reply",
        type: "POST",
        data:  formData,
        contentType: false,
            cache: false,
        processData:false,
        
        success: function(response) {
            
            console.log(response);

            var data = JSON.parse(response);

            if(data.error){
                var error = data.error.msg;
                // App.alerterWarning(error); 

                // function explode(){
                //     $("#success-msg").hide();
                // }
                // setTimeout(explode, 2000);
                
                

            }else if(data.success){
                var error = data.success.msg;
                // App.alerterSuccesss(error);
                var bla = $('#message1').val();
                var now = '<div class="21/12/2019" style="margin: 26px 0 26px;overflow:hidden;"><div class="sent_msg"><p>' + bla +'</p><span class="time_date"> Now</span></div></div>';

                $("#msg_history").append(now);
                now.show('slow');
                // $("#message1").attr('value', '');

                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))