function formValidation(e) {
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById("lastName");
    var email = document.getElementById("username");
    var hometown = document.getElementById("college");
    var major = document.getElementById("major");

    if (emailVerification(email)){
        return;
    }

    alert("Fix mistakes before submitting");
    e.preventDefault();
    return;

}


function emailVerification(input){
    var input = input.value;
    if (input.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)){
        document.getElementById("alert3").innerHTML = "";
        return true;
    }
    else{
        document.getElementById("alert3").innerHTML = "Must be an email address";
        return false;
    }
}

