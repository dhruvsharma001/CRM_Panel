<form method="post" action="http://project_path/submit-review/" name="review_form">
 
<input type="hidden" name="product_id" value=1>
 
&nbsp;
 
<div class="rating">
 
<h4>Rate This Product</h4>
 
<a href="javascript:void(0)" onClick="Star_rate(1)" id="star1"><img src="http://project_path/images/ empty_star.png" alt=""></a>
 
<input type="radio" name="star" id="star_1" value="1" style="display:none" >
 
<a href="javascript:void(0)" onClick="Star_rate(2)"  id="star2"><img src="http://project_path/images/ empty_star.png" alt=""></a>
 
<input type="radio" name="star" id="star_2" value="2" style="display:none" >
 
<a href="javascript:void(0)" onClick="Star_rate(3)"  id="star3"><img src="http://project_path/images/ empty_star.png" alt=""></a>
 
<input type="radio" name="star" id="star_3" value="3" style="display:none" >
 
<a href="javascript:void(0)" onClick="Star_rate(4)"  id="star4"><img src="http://project_path/images/ empty_star.png" alt=""></a>
 
<input type="radio" name="star" id="star_4" value="4" style="display:none" >
 
<a href="javascript:void(0)" onClick="Star_rate(5)"  id="star5"><img src="http://project_path/images/ empty_star.png" alt=""></a>
 
<input type="radio" name="star" id="star_5" value="5" style="display:none" >
 
<br class="spacer">
 
</div>
 
&nbsp;
 
<h4>Your Review</h4>
 
<label>Review Title: </label>
 
<input type="text" name="review_title" id="review_title">
 
<label>Your Name: </label>
 
<input type="text" name="reviewer_name" id="reviewer_name" ><br>
 
<label>Review Comments: </label>
 
<textarea name="comments" ></textarea><br>
 
<input type="submit" value="Submit Review" name="submit_review" id="submit_review">
 
</form>

<script>
 
function Star_rate(rate)
 
{
 
//As per the value of rate parameter, mark respective radio button as “checked”
 
btn = document.getElementById("star_"+rate);
 
btn.checked = true;
 
&nbsp;
 
//display correct rate stars images
 
var star = document.getElementById("star"+rate).innerHTML;
 
var empty_star = '<img src="http://project_path/images/empty_star.png" alt="">';
 
var full_star = '<img src="http://project_path/images/full_star.png" alt="">';
 
&nbsp;
 
if(star == empty_star)   //if an empty star is clicked, rating is done till that star
 
{
 
for(i = rate; i>0; i--)
 
{
 
document.getElementById("star"+i).innerHTML = full_star;
 
}
 
}
 
else if(star == full_star) //if a full star anchor is clicked, rating is reduced to that star
 
{
 
for(i = rate; i <= 5; i++)
 
{
 
document.getElementById("star"+(i+1)).innerHTML = empty_star;
 
}
 
}
 
}
 
</script>
<script src="custom1.js"></script>