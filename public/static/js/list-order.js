$("#form").on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this)
    App.showModal();

    // App.alerterWarning('warning');
    var value = $("#form").serialize();
    console.log(formData);
    $.ajax({
        url: "/submit_list/",
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
                App.alerterWarning(error);               
                

            }else if(data.success){
                var error = data.success.msg;
                $("#form")[0].reset();
                App.alerterSuccesss(error);
                function explode(){
                    window.location.href = "/my_listing/"
                }
                setTimeout(explode, 3000);
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))