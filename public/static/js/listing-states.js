function changeCountry(value) {
    var res = value.split("_");
    var country = res[0];
    var country_id = res[1];
    // alert(phone_id);
    array_id = {
            "id" : country_id
        }
    $.ajax({
        url: "/states",
        type: "POST",
        data:  array_id,
        
        
        success: function(data) {
            // console.log(data);
            var rs = JSON.parse(data);
            $("#model").removeAttr('disabled');
            // console.log(rs.response.data);
            var listItems = '<option value="">Select State</option>';
            $.each(JSON.parse(rs.response.data), function(k, v) {

                listItems += "<option value='" + v.states + "'>" + v.states + "</option>";
            });
            $("#state").html(listItems);

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