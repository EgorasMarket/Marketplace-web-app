$("#addphone").on('click',(function(e) {
    e.preventDefault();
    
    var value = $("#newphone").serialize();
    App.showModal();
    
    // console.log(formData);
    $.ajax({
        url: "/new_phone/",
        type: "POST",
        data:  value,
        // contentType: false,
        //     cache: false,
        // processData:false,
        
        success: function(response) {
            
            console.log(response);

            var data = JSON.parse(response);

            if(data.error){
                var error = data.error.msg;
                App.alerterWarning(error); 
                

            }else if(data.success){
                var error = data.success.msg;
                App.alerterSuccesss(error);
                $("#newphone")[0].reset();
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))