$(document).ready(function () {
    setInterval(checkIfLogedIn, 1000);
});

function checkIfLogedIn() {

    if (checkCookie("walletId")) {
        let goto = getCookie("goto");
        if (goto != "") {
            let splited = goto.split('%2F');
            let stripped = splited.join('/')
            window.location.href = "/" + stripped;



        }

    }


}