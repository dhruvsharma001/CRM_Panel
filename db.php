<?php
function pagination()
{
	$pagination_buttons=11;
	if(isset($_GET['page']) AND !empty($_GET['page']))
	{
		$page_number=$_GET['page'];
	}
	else
	{
		$page_number=1;
	}
	$per_page_records=10;
	$rows=100;
	$last_page=ceil($rows/$per_page_records);
	$pagination.='<ul class="pagination">';
	if(page_number<1){
		$page_number=1;
	}
	else if($page_number > $last_page){
		$page_number=$last_page;
	}
	echo'<h3>'
}
?>