$(document).ready(function () {
    var listItems = '<option value="">Select Brand</option>';
    $("#brand").html(listItems);
    var listItems2 = '<option value="">Select Model</option>';
    $("#model").html(listItems2);

    $.ajax({
        url: "/listing_details/fetchPhones",
        type: "POST",
        // data:  array_id,
        
        
        success: function(data) {
            var rs = JSON.parse(data);
            // console.log(rs.response.data);
            $("#brand").removeAttr('disabled');
            // var listItems = '<option value="">Select Brand</option>';
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

function changeBrand(value) {
    var res = value.split("_");
    var phone = res[0];
    var phone_id = res[1];
    // alert(phone_id);
    array_id = {
            "phone_id" : phone_id
        }
    $.ajax({
        url: "/listing_details/fetchModels",
        type: "POST",
        data:  array_id,
        
        
        success: function(data) {
            // console.log(data);
            var rs = JSON.parse(data);
            $("#model").removeAttr('disabled');
            // console.log(rs.response.data);
            var listItems2 = '<option value="">Select Model</option>';
            $.each(JSON.parse(rs.response.data), function(k, v) {

                listItems2 += "<option value='" + v.model + "'>" + v.model + "</option>";
            });
            $("#model").html(listItems2);

            if(data.error){
                var error = data.error.msg;
            }else if(data.success){
                var error = data.success.msg;
            }	
        
        },
        error: function(e) {
    
        }          
    });
}


