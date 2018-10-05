$(document).ready(function(){
function showProfileModal(id){
$("#modalForm").modal()
$.ajax({
type: "POST",
url: "profileupdate.php",
data: $('form.modalForm').serialize(),
success: function(message){
$("#modalForm").html(message)
$("#modalForm").modal('hide');
},
error: function(){
alert("Error");
}
});
});
});
