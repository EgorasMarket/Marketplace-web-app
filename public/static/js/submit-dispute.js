$("#form").on('submit',(function(e) {
    e.preventDefault();
    // alert('ok');
    var formData = new FormData(this)
    // var value = $("#form").serialize();
    // console.log(formData);
    $.ajax({
        url: "/submit_dispute/",
        type: "POST",
        data:  formData,
        contentType: false,
            cache: false,
        processData:false,
        
        success: function(response) {
            
            console.log(response);

            var data = JSON.parse(response);

            if(data.error){
                // console.log(data.error.msg);
                // var error = '<div class="alert alert-warning" role="alert">'+ data.error.msg +'</div>';
                // $("#success-msg").html(error).fadeIn("slow");


            }else if(data.success){
                // var error = data.success.msg;
                var bla = $('#disputeMessage').val();
                // alert(bla);
                var now = '<div class="media msg" style="background: #e5e5e5;"><div class="media-body"><small class="pull-right" style="color:#897878;"><i class="fa fa-clock-o"></i>Now</small><h5 class="media-heading">Me</h5><small class="col-lg-10">' + bla +'</small></div></div>';

                $("#disputemsg").prepend(now);
                now.show('slow');
                // $("#message1").attr('value', '');
                $("#form")[0].reset();
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))