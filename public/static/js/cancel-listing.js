function deleteId(id){
    // alert(id);
    // e.preventDefault();
    array_id = {
        "main_id" : id
    }
    // console.log(array_id);
  
    $.ajax({
          url: "/cancel_listing/",
          type: "POST",
          data:  array_id,
         
              
          
          success: function(response) {
  
              console.log(response);
  
              var data = JSON.parse(response);
              
              // console.log(data);
              if(data.error){
                  // console.log(data.error.msg);
                  var error = data.error.msg;
                  setTimeout(function(){
                      enableButton(id);
                    }, 1000);
                  
  
              }else if(data.success){
                  // console.log(data.success.msg);
                  var error = data.success.msg;
                  $('#hiderow'+id).slideUp();
                //   $('#success-card').slideDown("slow");
                //   $('#form')[0].reset();
                // setTimeout(function(){
                //   enableButton(id);
                // }, 1000);
                  
              }	
          
          },
          error: function(e) {
            // console.log(response);
      
          }          
      });
  }