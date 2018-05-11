function validateInfo() {
	var  id = document.forms[arguments[0]]["id"].value;
	if (id == 0) {
		alert("Please choose your ID first")
		return false;
	}
} 