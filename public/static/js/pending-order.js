// $(document).ready(function () {


//   $.ajax({
//     url: "/pending_order/",
//     type: "POST",
//     //   data:  array_id,



//     success: function (response) {


//       var rs = JSON.parse(response);

//       console.log(rs.response.data);
//       let walletID = getCookie("walletId");
//       $.each(JSON.parse(rs.response.data), function (k, v) {
//         var date = v.date_created;
//         var neet = date.split(" ");
//         var main = neet[0];
//         var real_date = main.replace(/-/g, " ");
//         console.log(walletID);

//         if (walletID.toLowerCase() == v.lockBy.toLowerCase()) {

//         }





//         $("#device_name").html("<span>" + v.brand + " " + v.model + "</span>");
//         $("#list_date").html("<span>" + real_date + "</span>");
//         $("#mprice").html("<span>" + v.price + "</span>");
//         $('#myImg').attr('src', "/public/static/phones/" + v.img);
//       });

//       if (response.error) {
//         //   console.log(data.error.msg);



//       } else if (response.success) {
//         console.log(data.success.msg);
//         //   $('#form-div').hide();
//         //   $('#success-card').slideDown("slow");
//         //   $('#form')[0].reset();


//       }

//     },
//     error: function (e) {
//       // console.log(response);

//     }
//   });
// });