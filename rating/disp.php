<?php
include('rt.php');
$disp_result=mysqli_query("SELECT rating,nov FROM content_rating WHERE content_rating.cont_id= $cont_id");
$disp_row=mysqli_fetch_object($disp_result);
if($disp_row){

$score_avg=number_format(($disp_row->rating/$disp_row->nov),2,".","");
//($score/$nov);

echo "Average ratting:$score_avg : ";

$rt=round($score_avg);
$img="";
$i=1;
while($i<=$rt){
$img=$img."<img src=images/star.gif >";
$i=$i+1;
}
while($i<=5){
$img=$img."<img src=images/star2.gif >";
$i=$i+1;
}
echo $img;
}

?>