<html>
<head>
<script>
function showResult(str)
{
if (str.length==0)
 { 
document.getElementById("txtHint").innerHTML="";
 return;
}
if (window.XMLHttpRequest)
 {// code for IE7+, Firefox, Chrome, Opera, Safari
 xmlhttp=new XMLHttpRequest();
}
else
{// code for IE6, IE5
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
}
}
xmlhttp.open("GET","materialSearch.php?r="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>
<div align="right" id="hsearch">
<input autocomplete="off" name="searchData" id="searchData" class="textbox" placeholder="search" tabindex="1"    type="text" maxlength="240" size="28" onkeyup="showResult(this.value)"/>             
</div>

<div id="txtHint" >
//HERE I HAVE PAGINATION AND SORTING CODE
<?php
$r=$_REQUEST['searchData'];
//DATABASE SETTINGS
$config['host'] = "localhost";
$config['user'] = "root";
$config['pass'] = "";
$config['database'] = "litako";
$config['table'] = "material";
$config['nicefields'] = true; //true or false | "Field Name" or "field_name"
$config['perpage'] = 10;
$config['showpagenumbers'] = true; //true or false
$config['showprevnext'] = true; //true or false


include './Pagination.php';
$Pagination = new Pagination();

//CONNECT
mysql_connect($config['host'], $config['user'], $config['pass']);
mysql_select_db($config['database']);

//get total rows
$totalrows = mysql_fetch_array(mysql_query("SELECT count(*) as total FROM `".$config['table']."`"));

//limit per page, what is current page, define first record for page
$limit = $config['perpage'];
if(isset($_GET['page']) && is_numeric(trim($_GET['page']))){$page =       mysql_real_escape_string($_GET['page']);}else{$page = 1;}
$startrow = $Pagination->getStartRow($page,$limit);

//create page links
if($config['showpagenumbers'] == true){
$pagination_links = $Pagination->showPageNumbers($totalrows['total'],$page,$limit);
}else{$pagination_links=null;}

if($config['showprevnext'] == true){
$prev_link = $Pagination->showPrev($totalrows['total'],$page,$limit);
$next_link = $Pagination->showNext($totalrows['total'],$page,$limit);
}else{$prev_link=null;$next_link=null;}

//IF ORDERBY NOT SET, SET DEFAULT
if(!isset($_GET['orderby']) OR trim($_GET['orderby']) == ""){
//GET FIRST FIELD IN TABLE TO BE DEFAULT SORT
$sql = "SELECT material.category,material.product,vendorlist.company FROM material inner Join vendorlist on    material.company=vendorlist.id where category like '%$r%' LIMIT 1";
$result = mysql_query($sql) or die(mysql_error());
$array = mysql_fetch_assoc($result);
//first field
$i = 0;
foreach($array as $key=>$value){
    if($i > 0){break;}else{
    $orderby=$key;}
    $i++;       
}
//default sort
$sort="ASC";
}else{
$orderby=mysql_real_escape_string($_GET['orderby']);
 }  

//IF SORT NOT SET OR VALID, SET DEFAULT
if(!isset($_GET['sort']) OR ($_GET['sort'] != "ASC" AND $_GET['sort'] != "DESC")){
//default sort
    $sort="ASC";
}else{  
    $sort=mysql_real_escape_string($_GET['sort']);
}

//GET DATA
$sql = "SELECT     vendorlist.company,material.id,material.category,material.product,material.description,material.price,material.UOM     FROM material inner Join vendorlist on material.company=vendorlist.id where category like '%$r%' ORDER BY $orderby     $sort LIMIT $startrow,$limit";
$result = mysql_query($sql) or die(mysql_error());

$sql2 = "SELECT material.category,material.product,vendorlist.company FROM material inner Join vendorlist on     material.company=vendorlist.id ORDER BY $orderby $sort LIMIT $startrow,$limit";
$result2 = mysql_query($sql2) or die(mysql_error());
//START TABLE AND TABLE HEADER
echo "<table width='100%' >\n<tr>";
$array = mysql_fetch_assoc($result2);
foreach ($array as $key=>$value) {
if($config['nicefields']){
$field = str_replace("_"," ",$key);
$field = ucwords($field);
}
$field = columnSortArrows($key,$field,$orderby,$sort);
echo "<th class='lvtCol'>" . $field . "</th>\n";
}
echo "<th class='lvtCol'>" . "Description of goods" . "</th>\n";
echo "<th class='lvtCol'>" . "Unit Price " . "</th>\n";
echo "<th class='lvtCol'>" . "UOM" . "</th>\n";
echo "<th class='lvtCol'>" . "Action" . "</th>\n";
echo "</tr>\n";

//reset result pointer
mysql_data_seek($result2,0);

//start first row style
$tr_class = "class='odd'";

while($row = mysql_fetch_array($result))
{
$id=$row['id'];
echo "<tr ".$tr_class.">\n";
echo "<td>" . $row['category'] . "</td>";
echo "<td><a href=\"viewMaterial.php?id=$id\" title='click to view'>" . $row['product']. "</a></td>";
echo "<td>" . $row['company'] . "</td>";
echo "<td width='100'>" . $row['description'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['UOM'] . "</td>";
echo "<td width='5%'>" . "<a href=\"editMaterial.php?id=$id\" title='click to edit '><img   src='edit.gif'/</a>"."|"."<a onclick=\"return confirm('Are you sure to delete?');\" href=\"deleteMaterial.php?  id=$id\" title='click to delete'><img src='delete.gif'/></a>". "</td>";
echo "</tr>\n";
$num++;
//switch row style
if($tr_class == "class='odd'"){
    $tr_class = "class='even'";
}else{
    $tr_class = "class='odd'";
}
}

//END TABLE
echo "</table>\n";

if(!($prev_link==null && $next_link==null && $pagination_links==null)){
echo '<div class="pagination">'."\n";
echo $prev_link;
echo $pagination_links;
echo $next_link;
echo '<div style="clear:both;"></div>'."\n";
echo "</div>\n";
}

/*FUNCTIONS*/

function columnSortArrows($field,$text,$currentfield=null,$currentsort=null){   
//defaults all field links to SORT ASC
//if field link is current ORDERBY then make arrow and opposite current SORT

$sortquery = "sort=ASC";
$orderquery = "orderby=".$field;

if($currentsort == "ASC"){
    $sortquery = "sort=DESC";
    $sortarrow = '<img src="arrow_up.png" />';
}

if($currentsort == "DESC"){
    $sortquery = "sort=ASC";
    $sortarrow = '<img src="arrow_down.png" />';
}

if($currentfield == $field){
    $orderquery = "orderby=".$field;
}else{  
    $sortarrow = null;
}

return '<a href="?'.$orderquery.'&'.$sortquery.'">'.$text.'</a> '. $sortarrow;  

}

?>
</div>
</body>
</html>
Hope can get the solution here. appreciate with your help. Thanks

php 