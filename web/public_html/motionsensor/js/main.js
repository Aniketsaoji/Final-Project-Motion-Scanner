function validate() {
	var pass = document.getElementById("password").value;
	var pass2 = document.getElementById("password2").value;
	if (pass != pass2) {
		var document.getElementById("afterpass").innerHTML = " Passwords don't match";
		return false;
	}
}