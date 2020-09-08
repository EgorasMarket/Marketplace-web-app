$(document).ready(function () {


  $.ajax({
    url: "/account_details/",
    type: "POST",
    //   data:  array_id,



    success: function (response) {


      var rs = JSON.parse(response);
      
      
      var main = rs.response.data;
      // console.log(main);
      
      var last_name = main[0].last_name;
      var first_name = main[0].first_name;
      var address = main[0].address;
      var state = main[0].state;

      var user_info = {
        "last_name" : last_name,
        "first_name" : first_name,
        "address" : address,
        "state" : state,

    }

      var storage_save = localStorage.setItem('user_info', JSON.stringify(user_info));

      $("#user_name").append("<span>" + last_name + "</span>");
      // $("#address").append("<span>" + address + "</span>");
      // $("#state_o").append("<span>" + state + "</span>");

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