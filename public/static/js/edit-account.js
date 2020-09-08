$("#form11").on('submit', (function(e) {
    e.preventDefault();
    var formData = new FormData(this)
    App.showModal();
    

    $.ajax({
        url: "/edit_account",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,

        success: function(response) {

            console.log(response);

            var data = JSON.parse(response);

            if (data.error) {
                var error = data.error.msg;
                App.alerterWarning(error); 


            } else if (data.success) {
                var error = data.success.msg;
                App.alerterSuccesss(error);
                function explode(){
                    window.location.href = "/my_account/"
                }
                setTimeout(explode, 3000);


            }

        },
        error: function(e) {

        }
    });

}))