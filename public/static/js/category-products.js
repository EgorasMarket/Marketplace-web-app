$(document).ready(function () {
    var sub_category = getCookie('sub_category');
   
       array_id = {
           "sub_category" : sub_category
       }
    //    console.log(array_id);
   
     $.ajax({
        url: "/category_products/",
        type: "POST",
        data:  array_id,
        beforeSend: function() {
            var rowbody = '<div id="loading2" class="col-md-12 col-sm-12"><div class="row align-items-center" style="height:228px;padding:10px;"><img style="height:70%;" src="/public/static/assets/company/ajax-loader.gif" class="img-fluid mx-auto" ></div></div>';
            $("#categoryproducts").html(rowbody);
        },
       success: function (response) {
        $("#loading2").hide();

        var rs = JSON.parse(response);

        if (rs.response.data.length == 0) {
            var rowbody = '<div class="col-md-12 col-sm-12"><div style="height:228px;padding:10px;"><div class="row align-items-center"><img style="height:70%;" src="/public/static/assets/company/abbreviation.png" class="img-fluid mx-auto" ></div><h6 class="text-center mt-2 text-muted">No related products available.</h6></div></div>';
            $("#categoryproducts").html(rowbody);
        } else {
            $.each(rs.response.data, function (k, v) {
   
                var rowbody = '<div class="col-md-2 col-sm-4"><a href="/phone_item/'+ v.slug +'"><div class="more-items-img"><img class="mr-2 img-fluid" src="/public/static/phones/'+ v.img +'" width="" alt="Generic placeholder image"></div><div class="custodian-price pb-2"><p class="py-0 p-name">' + v.brand +' '+ v.model +' '+ v.screen_size + '</p><p class="font-weight-bold p-0"><img src="/public/static/assets/logos/egoras-dollar.png" style="width:8px;margin-bottom:4px;margin-right:3px;" class="img-fluid" >' + v.price + '</p></div></a></div>';
        
                $("#categoryproducts").append(rowbody);
               
            });
        }

   
         if (response.error) {
           //   console.log(data.error.msg);
   
   
   
         } else if (response.success) {
           console.log(data.success.msg);
   
   
         }
   
       },
       error: function (e) {
         // console.log(response);
   
       }
     });
   });