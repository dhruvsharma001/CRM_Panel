var name = document.getElementByname("name").value;
var email = document.getElementByemail("email").value;
var phone = document.getElementByphone("phone").value;
var contact_person = document.getElementBycontact_person("contact_person").value;
var address = document.getElementByaddress("address").value;
// Returns successful data submission message when the entered information is stored in database.
var dataString = 'name1=' + name + '&email1=' + email + '&phone1=' + phone + '&contact_person1=' + contact_person + '&address1=' + address;
console.log(dataString);

if (name == '' || email == '' || phone == '' || contact_person == '' || address == '') {
alert("Please Fill All Fields");
} else {
// AJAX code to submit form.
$.ajax({
type: "POST",
url: "profileupdate.php",
dataType:'JSON',
data:$(form).serialie(),
cache: false,
success: function(html) {
alert(html);
}
});
}
return false;
}
