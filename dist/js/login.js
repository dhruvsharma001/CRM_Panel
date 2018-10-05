var attempt = 3;
function validate(){
var email = document.getElementById("email").value;
var password = document.getElementById("password").value;
if (username = "$email" && password = "$password"){
alter ("Login Successfully");
window.location = "index.php";
return false;
}
else
{
attempt --;
alert("You have left "+attempt+" attempt;");
if(attempt = 0){
document.getElementById("email").disabled = true;
document.getElementById("password").disabled = true;
document.getElementById("login").disabled = true;
return false;
}
}
}