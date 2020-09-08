$(document).ready(function () {


    $.ajax({
      url: "/get_message/all_messages",
      type: "POST",
      //   data:  array_id,
  
  
  
      success: function (response) {
  
  
        var rs = JSON.parse(response);
        console.log(rs);
        
        if (JSON.parse(rs.response.data).length == 0) {
            // var rowbody = '<div class="col-md-12 col-sm-12"><div style="height:228px;padding:10px;"><div class="row align-items-center"><img style="height:70%;" src="/public/static/assets/company/abbreviation.png" class="img-fluid mx-auto" ></div><h6 class="text-center mt-2 text-muted">No more items from this custodian.</h6></div></div>';
            // $("#categoryproducts").html(rowbody);
          } else {
            $.each(JSON.parse(rs.response.data), function (k, v) {

                console.log(v);
                
                var count = 40;
                var product_slug = v.product_slug;
                var clean = product_slug.replace(/-/g, " ");
                // var buyer_id = v.buyer;
                var message = v.message;
                var date_created = v.date_created;

                var result = clean.slice(0, count) + (clean.length > count ? "..." : "");

                function getDateFormat(date) {
                    var d = new Date(date),
                            month = '' + (d.getMonth() + 1),
                            day = '' + d.getDate(),
                            year = d.getFullYear();
                    
                    if (month.length < 2)
                        month = '0' + month;
                    if (day.length < 2)
                        day = '0' + day;
                    var date = new Date();
                    date.toLocaleDateString();
                    
                    return [day, month, year].join(' ');
                };

                var fomatdate = getDateFormat(date_created);
    
              rowbody = '<a href="/unique_message/' + id + '"><div class="chat_list"><div class="chat_people"><div class="chat_img"> </div><div class="chat_ib"><h5>' + result +'<span class="chat_date">' + fomatdate +'</span></h5><p>' + message +'</p></div></div></div></a>';
                
              $("#chatnotification").append(rowbody);
    
            });
          }

  
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