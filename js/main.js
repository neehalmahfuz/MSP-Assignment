// Form Validation
var gErrorMsg = "";
  
function validateForm(){
    "use strict";
    var all_ok = false;
    gErrorMsg = ""; // reset error message
	var first_name = document.getElementById("first_name").value;
	var last_name = document.getElementById("last_name").value;
	var email = document.getElementById("email").value;
	var phone_num = document.getElementById("phone_num").value;
	var street_address = document.getElementById("street_address").value;
	var city_town = document.getElementById("city_town").value;
	var state = document.getElementById("state").value;
	var postcode = document.getElementById("postcode").value;
	var subject = document.getElementById("subject").value;
	var rate = document.getElementById("rate").value;
	var comments = document.getElementById("comments").value;
    var first_name_ok = chkFirstName();
    var last_name_ok = chkLastName();
	var phone_num_ok = chkPhoneNum();
    var email_ok = chkEmail();
	var address_ok = chkAddress();
	var state_ok = chkState();
	var postcode_ok = chkPostcode();
	var subject_ok = chkSubject();
    
      
    if (first_name_ok && last_name_ok && phone_num_ok && email_ok && address_ok && state_ok && postcode_ok && subject_ok){
		all_ok = true;
    }
    else{
        alert(gErrorMsg);	//display concatenated error messages
			gErrorMsg = "";	//reset error message
        all_ok = false;
    }
	if (all_ok){
		storeBooking(first_name, last_name, phone_num, email, street_address, city_town, state, postcode, subject, rate, comments);
	}
	
	return all_ok;
}

// Validate First Name
function chkFirstName(){
    var first_name = document.getElementById("first_name").value;
	var pattern = /^[a-zA-z ]+$/;
	var first_name_ok = true;
	if ((first_name.length == 0)){
		gErrorMsg = gErrorMsg + "Please enter a valid first name.\n";
		first_name_ok = false;
	
	}
	else{
		if (!pattern.test(first_name)){
			gErrorMsg = gErrorMsg + "Your last name must have alpha characters.\n";
			first_name_ok = false;
		}
	}
	
return first_name_ok;
}

// Validate Last Name
function chkLastName(){
    var last_name = document.getElementById("last_name").value;
	var pattern = /^[a-zA-z ]+$/;
	var last_name_ok = true;
	if ((last_name.length == 0)){
		gErrorMsg = gErrorMsg + "Please enter a valid last name.\n";
		last_name_ok = false;
	}
	else{
		if (!pattern.test(last_name)){
			gErrorMsg = gErrorMsg + "Your last name must have alpha characters.\n";
			last_name_ok = false;
		}
	}
	
return last_name_ok;
}

// Validate Phone Number
function chkPhoneNum(){
	var phone = document.getElementById("phone_num").value;
	var pattern = /^[0-9]+$/;
	var phone_num_ok = true;
	if ((phone.length == 0)){
		gErrorMsg = gErrorMsg + "Your phone number cannot be blank.\n";
		phone_num_ok = false;
	}
	else{
			if(!pattern.test(phone)){
				gErrorMsg = gErrorMsg + "Please enter a valid phone number.\n";
				phone_num_ok = false;
			}
	}
	return phone_num_ok;
}

// Validate Email
function chkEmail(){
	var email = document.getElementById("email");
	var email_ok = false;
	var pattern = /[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-za-zA-Z0-9.-]{1,4}$/;
	if (pattern.test(email.value)){
		email_ok = true;
	}
	else{
		email_ok = false;
		gErrorMsg = gErrorMsg + "Please enter a valid email.\n";
	}
	
	return email_ok;
}

// Validate Address
function chkAddress(){
	var address = document.getElementById("street_address").value;
	var city = document.getElementById("city_town").value;
	var address_ok = true;
	if ((address.length == 0) && (city.length == 0)){
		gErrorMsg = gErrorMsg + "Please enter your address.\n";
		address_ok = false;
	}
	
	return address_ok;
}

// Validate State
function chkState(){
	var selected = true;
	var state = document.getElementById("state").value;
	if (state!="none"){
		selected = true;
	}
	else{
		selected = false;
		gErrorMsg = gErrorMsg + "Please select a state.\n";
	}
	
	return selected;
}

// Validate Postcode
function chkPostcode(){
	var postcode = document.getElementById("postcode").value;
	var pattern = /^[0-9]+$/;
	var postcode_ok = true;
	if ((postcode.length > 5) || (postcode.length < 5)){
		gErrorMsg = gErrorMsg + "Your postcode must be only 5 numbers.\n";
		postcode_ok = false;
	}
	else{
			if(!pattern.test(postcode)){
				gErrorMsg = gErrorMsg + "Please enter a valid postcode.\n";
				postcode_ok = false;
			}
	}
	return postcode_ok;
}

// Validate Subject
function chkSubject(){
	var subject = document.getElementById("subject").value;
	var subject_ok = true;
	if ((subject.length == 0)){
		gErrorMsg = gErrorMsg + "Your subject cannot be blank.\n";
		subject_ok = false;
	}
	
	return subject_ok;
}


// Transfer between pages

function storeitem(item_id) {
	sessionStorage.setItem("item_id", item_id);
    window.location.replace("enquiry.html");
}

function displayitem() {
    document.getElementById("subject").value = "RE: Enquiry on " + sessionStorage.getItem("item_id");
	document.getElementById("service").value = sessionStorage.getItem("item_id");
}

function initalise() {
	var formElement = document.getElementById("enquiry_form");
    
	displayitem();
  
}