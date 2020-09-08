$(document).ready(function () {

    $.ajax({
        url: "/countries",
        type: "POST",
        // data:  array_id,


        success: function (data) {
            var rs = JSON.parse(data);
            // console.log(rs.response.data);

            var listItems = '<option>Default select</option>';
            $.each(JSON.parse(rs.response.data), function (k, v) {

                listItems += "<option value='" + v.country + '_' + v.id + "'>" + v.country + "</option>";
            });
            $("#countrys").html(listItems);

            if (data.error) {
                var error = data.error.msg;
            } else if (data.success) {
                var error = data.success.msg;
            }

        },
        error: function (e) {

        }
    });
});