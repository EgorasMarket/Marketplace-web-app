$(document).ready(function (){
    
    $.ajax({
        url: "/listing_details/fetchPhones",
        type: "POST",
        // data:  array_id,
        
        
        success: function(data) {
            var rs = JSON.parse(data);
            // console.log(rs.response.data);

            var listItems = '<option>Default select</option>';
            $.each(JSON.parse(rs.response.data), function(k, v) {

                listItems += "<option value='" + v.phone +'_'+ v.id + "'>" + v.phone + "</option>";
            });
            $("#brand").html(listItems);

            if(data.error){
                var error = data.error.msg;
            }else if(data.success){
                var error = data.success.msg;
            }	
        
        },
        error: function(e) {
    
        }          
    });
});