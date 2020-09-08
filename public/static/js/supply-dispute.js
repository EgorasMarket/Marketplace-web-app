$(document).ready(function () {
    var slug = $("#slug"). val();
    // console.log(slug);
    var array = {
        slug : slug
    }
    

    $.ajax({
      url: "/get_dispute/",
      type: "POST",
        data:  array,
  
  
  
      success: function (response) {
  
  
        var rs = JSON.parse(response);
        // console.log(rs);
        
        if (JSON.parse(rs.response.data).length == 0) {
            // var rowbody = '<div class="col-md-12 col-sm-12"><div style="height:228px;padding:10px;"><div class="row align-items-center"><img style="height:70%;" src="/public/static/assets/company/abbreviation.png" class="img-fluid mx-auto" ></div><h6 class="text-center mt-2 text-muted">No more items from this custodian.</h6></div></div>';
            // $("#categoryproducts").html(rowbody);
          } else {
            $.each(JSON.parse(rs.response.data), function (k, v) {

                // console.log(v);
                
                var slug = v.slug;
                var message = v.message;
                var upload = v.upload;
                var date_added = v.date_added;
                var first_name = v.first_name;
                var last_name = v.last_name;
                // var fullname = first_name +' ' +last_name;
                
                var user_infos = user_info();
                var lastname = user_infos.last_name;
                var firstname = user_infos.first_name;

                if (first_name === firstname && last_name === lastname) {
                    var fullname = 'Me';
                } else {
                    var fullname = first_name +' ' +last_name;
                }

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

                var fomatdate = getDateFormat(date_added);
    
              

              if (upload === '') {
                rowbody = '<div class="media msg "><div class="media-body"><small class="pull-right time"><i class="fa fa-clock-o"></i>' + fomatdate +'</small><h5 class="media-heading">' + fullname +'</h5><p class="col-lg-10">' + message +'</p></div></div>';
              } else {
                rowbody = '<div class="media msg "><div class="media-body"><small class="pull-right time"><i class="fa fa-clock-o"></i>' + fomatdate +'</small><h5 class="media-heading">' + fullname +'</h5><p class="col-lg-10">' + message +'</p><img class="media-object img-fluid" alt="" width="55" src="/public/static/evidence/' + upload +'"></div></div>';
              }
                
              $("#disputemsg").append(rowbody);
    
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