// Scroll Top
window.onscroll=function () {
	scrollFunction();
}
function scrollFunction() {
	if (document.body.scrollTop>60 || document.documentElement.scrollTop>60) {
	document.getElementById('top').style.display="block";
}
else
{
	document.getElementById('top').style.display="none";
}
}

function topFunction() {
	document.body.scrollTop=0;
	document.documentElement.scrollTop=0;
}

//script for 'Password'
function showPassword(){
	var x=document.getElementById('password');
if (x.type==='password') {
	x.type = 'text';
}
else{
	x.type='password';
}
}