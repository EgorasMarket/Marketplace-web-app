$("#form2").on('submit',(function(e) {
    e.preventDefault();
    // alert('ok');
    var formData = new FormData(this)
    // var value = $("#form").serialize();
    // console.log(formData);
    $.ajax({
        url: "/contact_us/",
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
                
                

            }else if(data.success){
                // var error = data.success.msg;
                var error = '<div class="alert alert-success" role="alert"> Thank You for contacting us, we will get back to you shortly.</div>';
                $("#contact").html(error).fadeIn("slow");
                // $("#listbody").slideUp()
                $("#form2")[0].reset();

                function explode(){
                    // $(".close").trigger("click");
                    $("#contact").hide();
                    // $("#listbody").show();
                }
                setTimeout(explode, 3000);
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))