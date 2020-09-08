$("#form").on('submit',(function(e) {
    e.preventDefault();
    // alert('ok');
    var formData = new FormData(this)
    // var value = $("#form").serialize();
    // console.log(formData);
    $.ajax({
        url: "/submit_waitlist/",
        type: "POST",
        data:  formData,
        contentType: false,
            cache: false,
        processData:false,
        
        success: function(response) {
            
            console.log(response);

            var data = JSON.parse(response);

            if(data.error){
                console.log(data.error.msg);
                var error = '<div class="alert alert-warning" role="alert">'+ data.error.msg +'</div>';
                $("#success-msg").html(error).fadeIn("slow");

                function explode(){
                    $("#success-msg").hide();
                }
                setTimeout(explode, 2000);
                
                

            }else if(data.success){
                // var error = data.success.msg;
                var error = '<div class="alert alert-success" role="alert"> You have been added to our waitlist, you will be the FIRST to know when the Egoras marketplace goes online.</div>';
                $("#success-msg").html(error).fadeIn("slow");
                $("#listbody").slideUp()
                $("#form")[0].reset();

                function explode(){
                    $(".close").trigger("click");
                    $("#success-msg").hide();
                    $("#listbody").show();
                }
                setTimeout(explode, 2500);
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))