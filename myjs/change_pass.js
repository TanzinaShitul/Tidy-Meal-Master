function Chk_Valid() {
	var flag=true;
	var _password= document.forms['change_pass_input']['newPassword'].value;
	var _conf_password= document.forms['change_pass_input']['confirmPassword'].value;


	if(_password==null||_password==''){
		document.getElementById('newPassword').className='redaleart';
		flag=false;
	}
	if(_conf_password==null||_conf_password==''){
		document.getElementById('confirmPassword').className='redaleart';
		flag=false;
	}
	return flag;
}

function Reform1(){
	document.getElementById('newPassword').className='reform';
}
function Reform2(){
	document.getElementById('confirmPassword').className='reform';
}


