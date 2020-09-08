$(document).ready(function () {


    $.ajax({
      url: "/account_details/buyer_details",
      type: "POST",
      //   data:  array_id,
  
  
  
      success: function (response) {
  
  
        var rs = JSON.parse(response);
        
        
        var main = rs.response.data;
        // console.log(main);
        
        var last_name = main[0].last_name;
        
  
        $("#user_name").append("<span>" + last_name + "</span>");

  
        if (response.error) {
          //   console.log(data.error.msg);
  
  
  
        } else if (response.success) {
          console.log(response.success.msg);
          //   $('#form-div').hide();
          //   $('#success-card').slideDown("slow");
          //   $('#form')[0].reset();
  
  
        }
  
      },
      error: function (e) {
        // console.log(response);
  
      }
    });
  });