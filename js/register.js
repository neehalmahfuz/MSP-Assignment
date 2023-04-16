
// Form Validation
var gErrorMsg = "";

function initialize() {
	var rForm = document.getElementById("register_form");
	rForm.onsubmit = validateForm;
}

function validateForm() {
    "use strict";
    var all_ok = false;
    gErrorMsg = ""; // reset error message
    var firstname = document.getElementById("firstname").value.trim();
    var lastname = document.getElementById("lastname").value.trim();
    var birthdate = document.getElementById("birthdate").value.trim(); 
    var phone = document.getElementById("phone").value.trim();   
    var state = document.getElementById("state").value.trim();
    var email = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();
    var gender = document.querySelector('input[name="gender"]:checked');

    var first_name_ok = chkFirstName();
    var last_name_ok = chkLastName();
    var birth_date_ok = chkBirthDate();
    var phone_number_ok = chkPhoneNumber();
    var state_ok = chkState();
    var email_ok = chkEmail();
    var password_ok = chkPassword();
    var gender_ok = chkGender();

    if (first_name_ok && last_name_ok && birth_date_ok && phone_number_ok && state_ok && email_ok && password_ok && gender_ok) {
        all_ok = true;
    }
    else {
        alert(gErrorMsg);	//display concatenated error messages
        gErrorMsg = "";	//reset error message
        all_ok = false;
    }
    if (all_ok){
        storeResgiter(firstname, lastname, birthdate, phone, state, email, password, gender);
	}
  
}

// Validate First Name

function chkFirstName() {
    var firstname = document.getElementById("firstname").value;
    var pattern = /^[a-zA-z ]+$/;
    var first_name_ok = true;
    if ((firstname.length == 0)) {
        gErrorMsg = gErrorMsg + "Please enter a valid first name.\n";
        first_name_ok = false;
    }
    else {
        if (!pattern.test(firstname)) {
            gErrorMsg = gErrorMsg + "Your first name must have alphabet.\n";
            first_name_ok = false;
        }
    }
return first_name_ok;
}

// Validate Last Name
function chkLastName() {
    var lastname = document.getElementById("lastname").value;
    var pattern = /^[a-zA-z ]+$/;
    var last_name_ok = true;
    if ((lastname.length == 0)) {
        gErrorMsg = gErrorMsg + "Please enter a valid last name.\n";
        last_name_ok = false;
    }
    else {
        if (!pattern.test(lastname)) {
            gErrorMsg = gErrorMsg + "Your last name must have alphabet.\n";
            last_name_ok = false;
        }
    }
return last_name_ok;
}

// Validate Birth Date
function chkBirthDate() {
    var birthdate = document.getElementById("birthdate").value;
    var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
    var birth_date_ok = true;
    if ((birthdate.length == 0)) {
        gErrorMsg = gErrorMsg + "Please enter your birthdate.\n";
        birth_date_ok = false;
    }
    else {
        if (!pattern.test(birthdate)) {
            gErrorMsg = gErrorMsg + "Please enter a valid birthdate in the format MM/DD/YYYY.\n";
            birth_date_ok = false;
        }
    }
return birth_date_ok;
}

// Validate Phone Number
function chkPhoneNumber() {
    var phone = document.getElementById("phone").value;
    var pattern = /^[0-9]+$/;
    var phone_number_ok = true;
    if ((phone.length == 0)) {
        gErrorMsg = gErrorMsg + "Your phone number cannot be blank.\n";
        phone_number_ok = false;
    }
    else {
        if (!pattern.test(phone)) {
            gErrorMsg = gErrorMsg + "Please enter a valid phone number.\n";
            phone_number_ok = false;
        }
    }
return phone_number_ok;
}

// Validate State
function chkState() {
    var state = document.getElementById("state").value;
    var pattern = /^[a-zA-z ]+$/;
    var state_ok = true;
    if ((state.length == 0)) {
        gErrorMsg = gErrorMsg + "Please enter a valid state.\n";
        state_ok = false;
    }
    else {
        if (!pattern.test(state)) {
            gErrorMsg = gErrorMsg + "Your state name must have alphabet.\n";
            state_ok = false;
        }
    }
return state_ok;
}

// Validate Email
function chkEmail() {
    var email = document.getElementById("email");
    var email_ok = false;
    var pattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-za-zA-Z0-9.-]{1,4}$/;
    if (pattern.test(email.value)) {
        email_ok = true;
    }
    else {
        email_ok = false;
        gErrorMsg = gErrorMsg + "Please enter a valid email.\n";
    }

return email_ok;
}

// Validate Password
function chkPassword() {
    var password = document.getElementById("password").value;
    var password_ok = true;
    if ((password.length == 0)) {
        gErrorMsg = gErrorMsg + "Your password cannot be blank.\n";
        password_ok = false;
    }
    else if (password.length < 6) { 
        {
            gErrorMsg = gErrorMsg + "Your password must be more than 6 characters.\n";
            password_ok = false;
        }
    }
return password_ok;
}

// Validate Gerder
function chkGender() {
    var gender = document.querySelector('input[name="gender"]:checked');
    var gender_ok = true;
    if (!gender) {
        gErrorMsg = gErrorMsg + "Please select your gender.\n";
        gender_ok = false;
    }
return gender_ok;
}

// Keep user data
function storeResgiter(firstname, lastname, birthdate, phone, state, email, password, gender){
	sessionStorage.firstname = firstname;
	sessionStorage.lastname = lastname;
    sessionStorage.birthdate = birthdate;
	sessionStorage.phone = phone;
	sessionStorage.email = email;
	sessionStorage.state = state;
	sessionStorage.password = password;
	sessionStorage.gender = gender;

}


window.onload = initialize;