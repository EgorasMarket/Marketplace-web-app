function findState(id) {
    $(".close").trigger("click");
    $("#trigState").trigger("click");
    // function explode(){
    //     $("#trigState").trigger("click");
    // }
    // setTimeout(explode, 1000);
    
    // alert(id); approveModal
    var array = {
        "id" : id
    }

    $.ajax({
        url: "/states/",
        type: "POST",
        data:  array,
        beforeSend: function() {
            var rowbody = '<div id="loading2" class="col-md-12 col-sm-12"><div class="row align-items-center" style="padding:10px;"><div class="loaderst">Loading...</div></div></div>';
            $("#supplystate").html(rowbody);
        },
        
        success: function(response) {
            $("#loading2").hide();
            
            // console.log(response);

            var data = JSON.parse(response);

            var listItems = '';
            $.each(JSON.parse(data.response.data), function(k, v) {

                listItems += '<div class="col-md-4 my-2"><a href="/local_order/'+ v.states +'" class="btn btn-link ml-4 text-orange bold">'+ v.states +'</a></div>';
            });
            $("#supplystate").html(listItems);

            if(data.error){
                var error = data.error.msg;
                App.alerterWarning(error); 
                

            }else if(data.success){
                var error = data.success.msg;
                App.alerterSuccesss(error);
                
                
            }	
        
        },
        error: function(e) {
    
        }          
    });
}