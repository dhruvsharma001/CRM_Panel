<?php
<form id="ratingsForm" class="animated zoomInUp">
 How was your experience?<br>
 <div class="stars" role="form">
 <input type="radio" name="star" class="star-1 showstar" id="star-1" value="1" />
 <label class="star-1" for="star-1">1</label>
 <input type="radio" name="star" class="star-2 showstar" id="star-2" value="2" />
 <label class="star-2" for="star-2">2</label>
 <input type="radio" name="star" class="star-3 showstar" id="star-3" value="3" />
 <label class="star-3" for="star-3">3</label>
 <input type="radio" name="star" class="star-4 showstar" id="star-4" value="4" />
 <label class="star-4" for="star-4">4</label>
 <input type="radio" name="star" class="star-5 showstar" id="star-5" value="5" />
 <label class="star-5" for="star-5">5</label>
 <span></span>
 </div>
 </form>
 
 form .stars {
  background: url("CRM/dist/img/stars.png") repeat-x 0 0;
  width: 150px;
  margin: 0 auto;
}
 
form .stars input[type="radio"] {
  position: absolute;
  opacity: 0;
  filter: alpha(opacity=0);
}
form .stars input[type="radio"].star-5:checked ~ span {
  width: 100%;
}
form .stars input[type="radio"].star-4:checked ~ span {
  width: 80%;
}
form .stars input[type="radio"].star-3:checked ~ span {
  width: 60%;
}
form .stars input[type="radio"].star-2:checked ~ span {
  width: 40%;
}
form .stars input[type="radio"].star-1:checked ~ span {
  width: 20%;
}
form .stars label {
  display: block;
  width: 30px;
  height: 30px;
  margin: 0!important;
  padding: 0!important;
  text-indent: -999em;
  float: left;
  position: relative;
  z-index: 10;
  background: transparent!important;
  cursor: pointer;
}
form .stars label:hover ~ span {
  background-position: 0 -30px;
}
form .stars label.star-5:hover ~ span {
  width: 100% !important;
}
form .stars label.star-4:hover ~ span {
  width: 80% !important;
}
form .stars label.star-3:hover ~ span {
  width: 60% !important;
}
form .stars label.star-2:hover ~ span {
  width: 40% !important;
}
form .stars label.star-1:hover ~ span {
  width: 20% !important;
}
form .stars span {
  display: block;
  width: 0;
  position: relative;
  top: 0;
  left: 0;
  height: 30px;
  background: url("CRM/dist/img/stars.png") repeat-x 0 -60px;
  -webkit-transition: -webkit-width 0.5s;
  -moz-transition: -moz-width 0.5s;
  -ms-transition: -ms-width 0.5s;
  -o-transition: -o-width 0.5s;
  transition: width 0.5s;
}

$(document).ready(function() {
 $("input[type=radio][name=star]").change(function() {
 var rating = this.value;
 <?php echo 'var username = "' . $_GET['who'] . '";'; ?>
 var tymsg = "Much appreciated! Any feedback?";
 $.ajax({
 type: "GET",
 async: true,
 url: "rating_backend.php",
 data: {"star": rating, "user" : username},
 success: function(output) {
 var json = eval('('+ output + ')');
 var responseMsg = json['status'];
 if(responseMsg=="success")
 {
 switch(rating)
 {
 case "1":
 tymsg = "Well, that's okay. Where can we improve?";
 break;
 case "5":
 tymsg = "Awesome! Thank you so much!";
 $("#ratingsForm").removeClass('animated zoomInUp').addClass('animated tada');
 }
 if(rating == "5")
 {
 $('#ratingsForm').html("How was your experience?<h5>" + tymsg + "</h5>").fadeIn(3000).delay(3000).fadeOut("slow");
 }
 else
 {
 $('#ratingsForm').html('How was your experience?<h5 style="margin-bottom:3px;">' + tymsg + '</h5><div class="row" style="margin-bottom:3px;"><div class="col-xs-2"></div><div class="col-xs-8" style="margin-top:10px;"><input style="height:2em;" class="form-control input-sm" id="feedbackTxt" placeholder="Any suggestions? Enter to submit." type="text" data-toggle="tooltip" title="Press enter to submit." data-placement="bottom"></div><div class="col-xs-2"></div></div><a href="" id="nothingtosay" >Click here to skip the feedback.</a>');//.fadeIn(3000).delay(1000).fadeOut("slow");
 }
 
 }
 else
 {
 $('#ratingsForm').html("How was your experience?<h5 style='color:red;'>" + responseMsg + "</h5>").fadeIn(3000).delay(4000).fadeOut("slow");
 }
 },
 error: function(output) {
 $('#ratingsForm').html("How was your experience?<h5 style='color:red;'>Something is not right. We\'ll try next time!</h5>").fadeIn(3000).delay(4000).fadeOut("slow");
 }
 });

 });
 $('body').on("keypress", "#feedbackTxt", function (e) {
 if (e.which == 13) {
 var feedback = this.value;
 <?php echo 'var username = "' . $_GET['who'] . '";'; ?>
 $.ajax({
 type: "GET",
 async: true,
 url: "rating_backend.php",
 data: {"feedback": feedback, "user" : username},
 success: function(output) {
 var json = eval('('+ output + ')');
 var responseMsg = json['status'];
 if(responseMsg == "success")
 {
 $('#ratingsForm').html("How was your experience?<h5>That's it! Thank you.</h5>").fadeIn(2000).delay(2000).fadeOut("slow");
 }
 else
 {
 $('#ratingsForm').html("How was your experience?<h5 style='color:red;'>" + responseMsg + "</h5>").fadeIn(3000).delay(4000).fadeOut("slow");
 }
 },
 error: function(output) {
 $('#ratingsForm').html("How was your experience?<h5 style='color:red;'>Something is not right. We\'ll try next time!</h5>").fadeIn(3000).delay(4000).fadeOut("slow");
 }
 });
 e.preventDefault();
 }
 });
 $('body').on("click", "#nothingtosay", function (e) {
 e.preventDefault();
 $('#ratingsForm').html("How was your experience?<h5>Alright, not a problem!</h5>").fadeIn(2000).delay(2000).fadeOut("slow");
 });
 });
?>