$("#form21").on('submit',(function(e) {
    e.preventDefault();
    App.showModal();
    var formData = new FormData(this)

    $.ajax({
        url: "/submit_message/",
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

                // function explode(){
                //     $("#success-msg").hide();
                // }
                // setTimeout(explode, 2000);
                
                

            }else if(data.success){
                var error = data.success.msg;
                App.alerterSuccesss(error);
                
                $("#form21")[0].reset();

                function explode(){
                    $("#txtModalClose").trigger("click");
                    $(".close").trigger("click");
                }
                setTimeout(explode, 3000);
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}))