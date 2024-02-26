function Chk_Valid() {
	var flag=true;
	var _email= document.forms['login_input']['userEmail'].value;
	var _password= document.forms['login_input']['usurePassword'].value;
	 // alert(_password +" "+ _password);
	if(_email==null||_email==''){
		document.getElementById('email').className='redaleart';
		flag=false;
	}

	if(_password==null||_password==''){
		document.getElementById('password').className='redaleart';
		flag=false;
	}
	return flag;
}

function Reform1(){
	document.getElementById('email').className='reform';
}
function Reform2(){
	document.getElementById('password').className='reform';
}


// function togglePasswordVisibility(passwordId) {
//     const password = document.getElementById(pass);
//     const togglePassword = document.getElementById('togglePassword');

//     // Toggle the type attribute 
//     const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
//     password.setAttribute('type', type);

//     // Toggle the eye slash icon 
//     if (togglePassword.src.match("mycss/img/eyeslash.png")) {
//         togglePassword.src = "mycss/img/eye.png";
//     } else {
//         togglePassword.src = "mycss/img/eyeslash.png";
//     }
// }

function togglePasswordVisibility(button) {
    const passwordInput = button.previousElementSibling; // Assuming the password input comes before the button in the structure

    // Toggle the type attribute 
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Toggle the eye slash icon 
    if (button.src.match("mycss/img/eyeslash.png")) {
        button.src = "mycss/img/eye.png";
    } else {
        button.src = "mycss/img/eyeslash.png";
    }
}


