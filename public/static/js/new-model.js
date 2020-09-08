$("#form").on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this)
    App.showModal();
    // var value = $("#form").serialize();
    // console.log(formData);
    $.ajax({
        url: "/new_model/",
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
                App.alerterSuccesss(error);
                $("#form")[0].reset();
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))