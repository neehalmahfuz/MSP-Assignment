// Form Validation
var gErrorMsg = "";

function initialize() {
	var rForm = document.getElementById("form");
	rForm.onsubmit = validateForm;
}


function validateForm(){
	"use strict";
	var all_ok = false;
	gErrorMsg = ""; // reset error message
	var courseName = document.getElementById("txtCourseName").value.trim();
	var price = document.getElementById("textPrice").value.trim();
	var duration = document.getElementById("textDuration").value.trim(); 
	var description = document.getElementById("DescriptionTxtArea").value.trim();   
	var courseImage = document.getElementById('CourseImage').value.trim();

	var courseName_ok = chkCourseName();
	var price_ok = chkPrice();
	var duration_ok = chkDuration();
	var description_ok = chkDescription();
	var courseImage_ok = chkCourseImage()

	if (courseName_ok && price_ok && duration_ok && description_ok && courseImage_ok) {
		all_ok = true;
	}
	else {
		alert(gErrorMsg);	//display concatenated error messages
		gErrorMsg = "";	//reset error message
		all_ok = false;
	}
	if (all_ok){
		storeResgiter(courseName, price, duration, description, courseImage);
	}

	if(all_ok){
		return true;
	} 
	else{
		return false;
	}
}

function chkCourseName() {
    var courseName = document.getElementById("txtCourseName").value;
    var pattern = /^[a-zA-z ]+$/;
    var courseName_ok = true;
    if ((courseName.length == 0)) {
        gErrorMsg = gErrorMsg + "Please enter a valid first name.\n";
        courseName_ok = false;
    }
    else {
        if (!pattern.test(courseName)) {
            gErrorMsg = gErrorMsg + "Your first name must have alphabet.\n";
            courseName_ok = false;
        }
    }
return courseName_ok;
}


function chkPrice() {
    var price = document.getElementById("textPrice").value;
    var pattern = /^[0-9]+(\.[0-9]{1,2})?$/; //
    var price_ok = true;
  
    if (price.length === 0) {
      	gErrorMsg = gErrorMsg + "Please enter a valid price.\n";
      	price_ok = false;
    } else {
      if (!pattern.test(price)) {
        	gErrorMsg = gErrorMsg + "Your price must be a number (with up to two decimal places).\n";
        	price_ok = false;
      }
    }
    return price_ok;
}

function chkDuration() {
    var duration = document.getElementById("textDuration").value;
    var pattern = /^[0-9]+$/; // This pattern allows positive whole numbers only
    var duration_ok = true;
  
    if (duration.length === 0) {
      	gErrorMsg = gErrorMsg + "Please enter a valid duration.\n";
      	duration_ok = false;
    } else {
      if (!pattern.test(duration)) {
        gErrorMsg = gErrorMsg + "Your duration must be a whole number.\n";
        duration_ok = false;
      }
    }
    return duration_ok;
}

function chkDescription() {
    var description = document.getElementById("DescriptionTxtArea").value;
    var description_ok = true;
  
    if (description.length === 0) {
      	gErrorMsg = gErrorMsg + "Please enter a description.\n";
      	description_ok = false;
    }
    return description_ok;
}

function chkCourseImage() {
    var courseImage = document.getElementById("CourseImage").value;
    var courseImage_ok = true;
  
    if (courseImage.length === 0) {
      	gErrorMsg = gErrorMsg + "Please upload a course image.\n";
      	courseImage_ok = false;
    } else {
      var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if (!allowedExtensions.exec(courseImage)) {
			gErrorMsg = gErrorMsg + "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.\n";
			courseImage_ok = false;
      }
    }
  
    return courseImage_ok;
}

function storeResgiter(courseName, price, duration, description, courseImage){
	sessionStorage.courseName = courseName;
	sessionStorage.price = price;
  	sessionStorage.duration = duration;
	sessionStorage.description = description;
	sessionStorage.courseImage = courseImage;
}



window.addEventListener('load', initialize);
