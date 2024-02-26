function Chk_Valid(){
	
	var flag=true;
	var _email=document.forms['reg_input']['userEmail'].value;
	var _name =document.forms['reg_input']['userName'].value;
	var _pass =document.forms['reg_input']['userPassword'].value;
	var _cpass=document.forms['reg_input']['confirmPassword'].value;
	var _bdate=document.forms['reg_input']['birthdate'].value;
	var _gender=document.forms['reg_input']['Gender'].value;
	var _phn=document.forms['reg_input']['usermobile'].value;

	

	var emailRegex = /^[\w-\.]+@(gmail|yahoo)\.com$/;
    if (!_email.match(emailRegex)) {
        document.getElementById('email').className = 'readalart';
        document.getElementById('emailAlert').style.display = 'block'; 
        flag = false;
    } else {
        document.getElementById('email').className = ''; 
        document.getElementById('emailAlert').style.display = 'none'; 
    } 

	if(_name=='' || _name==null){
		document.getElementById('name').className=('readalart');
		flag=false;
	}

	if (_pass.length < 6) {
        document.getElementById('password').classList.add('readalart');
        document.getElementById('passwordMsg').style.display = 'block'; 
        document.getElementById('cpassword').classList.add('readalart');
        flag = false;
    } else {
        document.getElementById('password').classList.remove('readalart'); 
        document.getElementById('passwordMsg').style.display = 'none';
        document.getElementById('cpassword').classList.remove('readalart'); 
    }

	if(_pass==''|| _pass==null || _cpass==''||_cpass==null || _pass!=_cpass){
		document.getElementById('password').className=('readalart');
		document.getElementById('cpassword').className=('readalart');
		flag=false;
	}

	if(_bdate=='' || _bdate==null){
		document.getElementById('bdate').className=('readalart');
		flag=false;
	}

	if(_gender==''||_gender==null){
		document.getElementById('gender').className=('readalart');
		flag=false;
	}

	var phoneRegex = /^(013|014|015|016|017|018|019)\d{8}$/;
	if(!_phn.match(phoneRegex)){
		document.getElementById('mobile').className=('readalart');
		flag=false;
	}

	return flag;
}

function Reform_email(){
	document.getElementById('email').className=('reform');
}

function Refrom_name(){
	document.getElementById('name').className=('refrom');
}

function Reform_pass(){
	document.getElementById('password').className=('reform');
}

function Reform_cpass(){
	document.getElementById('cpassword').className=('reform');
}

function Reform_date(){
	document.getElementById('bdate').className=('reform');
}

function Reform_gender(){
	document.getElementById('gender').className=('reform');
}

function Reform_mobile(){
	document.getElementById('mobile').className=('reform');
}

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


// function ValidateEmail(inputText){
// 	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
// 	if(!inputText.value.match(mailformat)){
// 		alert("You have entered an invalid email address!");
// 		document.form1.text1.focus();
// 		return false;
// 	}
	
// }
