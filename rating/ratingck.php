<?php
	include('rt.php');
	$todo=$_POST['todo'];
		if(isset($todo) and $todo=="submit-rating")
		{
			$rone=$_POST['rone'];

			$msg="";
			$status="OK";
			if(!isset($rone))
			{
				$msg=$msg."Pleae give your score and then click the button";
				$status="NOT OK";
			}				

			if ($status=="OK")
			{
				$result=mysqli_query("SELECT rating,nov FROM content_rating WHERE content_rating.cont_id= $cont_id");
				$rows=mysqli_num_rows($result);
				$row=mysqli_fetch_object($result);

				if($rows==0)
				{
					// This is a new page so first add a new record
					$tt=mysqli_query("insert into content_rating (cont_id,nov,rating) values ( $cont_id,1,$rone)");
				}

				else 
				{
					$rating=$row->rating;
					$nov=$row->nov + 1;		
					$status="OK";

					$rating=$rating+$rone;

						$result=mysqli_query("update content_rating set rating=$rating,nov=$nov where cont_id =$cont_id");

				}	
			}
			else{echo $msg;}
		}// end of todo checking
?>