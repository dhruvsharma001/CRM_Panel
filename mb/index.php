<?php
/****
* File: members_search/index.php
* Date: 11.20.2012
* Author: design1online.com, LLC
* Purpose: Searching and pagination example
****/
require_once('inc/database.php'); //make sure you update this file with your database info
require_once('inc/functions.php'); //our pagination function is now in this file
define("NUMBER_PER_PAGE", 5); //number of records per page of the search results

//display the search form
echo "<h2>Search Members</h2>
<form action='{$_SERVER['PHP_SELF']}' method='post'>
	<p>Name of Product: <input type='text' name='sample_name' /></p>
	<p>Batch No.: <input type='text' name='batch_no' /></p>
	<p>Date of Manufacture: <input type='text' name='date_of_mfg' /></p>
	<p>Date of Expiry: <input type='text' name='exp_delivery_date' /></p>
	<p>Test Required: <input type='text' name='test_description' /></p>
	<p>Status: <input type='text' name='status' /></p>
	<p>Action:</p>
	<p align='center'>
		<input type='submit' name='submit' value='Search' />
	</p>
</form>";

//load the current paginated page number
$page = ($_GET['page']) ? $_GET['page'] : 1;
$start = ($page-1) * NUMBER_PER_PAGE;

/**
* if we used the search form use those variables, otherwise look for
* variables passed in the URL because someone clicked on a page number
**/
$sample_name = ($_POST['sample_name']) ? $_POST['sample_name'] : $_GET['sample_name'];
$batch_no = ($_POST['batch_no']) ? $_POST['batch_no'] : $_GET['batch_no'];
$date_of_mfg = ($_POST['date_of_mfg']) ? $_POST['date_of_mfg'] : $_GET['date_of_mfg'];


$sql = "SELECT * FROM members WHERE 1=1";

if ($sample_name)
	$sql .= " AND sample_name='" . mysql_real_escape_string($sample_name) . "'";
	
if ($batch_no)
	$sql .= " AND batch_no='" . mysql_real_escape_string($batch_no) . "'";
	
if ($date_of_mfg)
	$sql .= " AND date_of_mfg='" . mysql_real_escape_string($date_of_mfg) . "'";
	
//this return the total number of records returned by our query
$total_records = mysql_num_rows(mysql_query($sql));

//now we limit our query to the number of results we want per page
$sql .= " LIMIT $start, " . NUMBER_PER_PAGE;

/**
* Next we display our pagination at the top of our search results
* and we include the search words filled into our form so we can pass
* this information to the page numbers. That way as they click from page
* to page the query will pull up the correct results
**/
pagination($page, $total_records, "sample_name=$sample_name&batch_no=$batch_no&date_of_mfg=$date_of_mfg");
	
$loop = mysql_query($sql)
	or die ('cannot run the query because: ' . mysql_error());
	
while ($record = mysql_fetch_assoc($loop))
	echo "<br/>{$record['sample_name']}) " . stripslashes($record['batch_no']) . " - {$record['date_of_mfg']}";

echo "<center>" . number_format($total_records) . " search results found</center>";

pagination($page, $total_records, "sample_name=$sample_name&batch_no=$batch_no&date_of_mfg=$date_of_mfg");