function changeSub(value) {
    // alert('ok');
    if (value === "smartphones") {
        array_id = {
            "sub_category" : value
        }
        // console.log(value);
        
        $.ajax({
            url: "/listing_details/fetchPhones",
            type: "POST",
            data:  array_id,
            
            
            success: function(data) {
                var rs = JSON.parse(data);
                // console.log(rs.response.data);
                $("#brand").removeAttr('disabled');
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
    }
}

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
            var listItems = '<option>Default select</option>';
            $.each(JSON.parse(rs.response.data), function(k, v) {

                listItems += "<option value='" + v.model + "'>" + v.model + "</option>";
            });
            $("#model").html(listItems);

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

function changeModel(value) {
    array = {
            "model" : value
        }
        // alert(array);
        // console.log(array);
        
    $.ajax({
        url: "/listing_details/fetchDetails",
        type: "POST",
        data:  array,
        
        
        success: function(data) {
            // console.log(data);
            
            var rs = JSON.parse(data);
            $("#selfie_cam").removeAttr('disabled');
            $("#main_cam").removeAttr('disabled');
            $("#operating_sys").removeAttr('disabled');
            $("#sim").removeAttr('disabled');
            $("#card_slot").removeAttr('disabled');
            $("#battery").removeAttr('disabled');
            // console.log(rs.response.data);
            var OS = '<option>Default select</option>';
            var sim = '<option>Default select</option>';
            var card_slot = '<option>Default select</option>';
            var main_cam = '<option>Default select</option>';
            var selfie_cam = '<option>Default select</option>';
            var battery = '<option>Default select</option>';
            $.each(JSON.parse(rs.response.data), function(k, v) {
                var weed = v.full_info;
                JSON.parse(weed, (key, value) => {
                    var final = (key, value);
                    if (key === "OS") {
                        OS += "<option value='" + final + "'>" + final + "</option>";
                    } else if (key === "sim") {
                        sim += "<option value='" + final + "'>" + final + "</option>";
                    } else if (key === "card_slot") {
                        card_slot += "<option value='" + final + "'>" + final + "</option>";
                    } else if (key === "main_cam") {
                        main_cam += "<option value='" + final + "'>" + final + "</option>";
                    } else if (key === "selfie_cam") {
                        selfie_cam += "<option value='" + final + "'>" + final + "</option>";
                    } else if (key === "battery") {
                        battery += "<option value='" + final + "'>" + final + "</option>";
                    } 
                });

            });
            $("#operating_sys").html(OS);
            $("#sim").html(sim);
            $("#card_slot").html(card_slot);
            $("#main_cam").html(main_cam);
            $("#selfie_cam").html(selfie_cam);
            $("#battery").html(battery);

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
