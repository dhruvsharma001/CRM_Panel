$('#uploadform').hide();
$(".deleteRecord").click(function(){
	//e.preventDefault();
    var r=  confirm("Are you sure to delete record?");
    if(r== true){
        return true;
    }else{
    return false;
    }
});


function showProfileModal(id){
$("#modalForm").modal();
}

function upload(btnId)
{
if(btnId=="order")
    {   
    $("#uploadstatus,#uploadreport,#uploadinvoice").hide();
    $('#uploadform').show();
    }
else if(btnId=="uploadreport")
    {

    $("#order,#uploadstatus,#uploadinvoice").hide();
    $('#uploadform').show();
    }
else if(btnId=="uploadstatus")
    {

    $("#order,#uploadreport,#uploadinvoice").hide();
    $('#uploadform').show();
    }
else 
    {
    
    $("#order,#uploadstatus,#uploadreport").hide();
    $('#uploadform').show();
    }
}