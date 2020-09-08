	

function user_info() {
    var retrievedObject = localStorage.getItem('user_info');
    // console.log(retrievedObject);
    
    var main_result = JSON.parse(retrievedObject);


    var last_name = main_result.last_name;
    var first_name = main_result.first_name;
    var address = main_result.address;
    var state = main_result.state;


    var unique_info = {
        "last_name" : last_name,
        "first_name" : first_name,
        "address" : address,
        "state" : state,

    }

    
    
    
    return unique_info;
}


