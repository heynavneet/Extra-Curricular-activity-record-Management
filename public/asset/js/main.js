// Function for validate entered mail is shardas mail or not
function ValidateEMail(email) {
	var sharda_email = email.slice(-12); // slice sharda.ac.in
	if(sharda_email == "sharda.ac.in"){
		return true;
	}else{
		return false;
	}
}

// 2018007307.navneet@ug.sharda.ac.in