<?php
require "../donate.thespeedgamers.com/admin/config.php";
require "../donate.thespeedgamers.com/admin/connect.php";

//GET TIME
date_default_timezone_set('America/Chicago'); 										// CDT
$current_date = date('Y-m-d H:i:s');														//Get current date and format it
$hour_date = date('Y-m-d H:i:s', strtotime($current_date . '-1 year'));			//Get current date MINUS a certain amount of time and format it		
echo $current_date."<br/>";					
echo $hour_date."<br/>";

//GET EVENT ID
$id =  $_GET['id']; 																					//Pull the id value from the URL passed

//PULL EVENT XML
$url = "http://donate.thespeedgamers.com/xml/".$id.".xml"; 						//URL to the xml (http://donate.thespeedgamers.com/xml/5387eca6e9e13.xml)
$xmlChipin = simplexml_load_file($url);													//Load up the XML file for parsing
$donationtotal = $xmlChipin->collectedAmount;										//Parse the "collectedAmount" value from the XML

//QUERY FOR LAST TOTAL
$getlasttotal = $link->query("SELECT donation_amount FROM dc_donations WHERE dt >= '$hour_date' AND dt <= '$current_date' AND event_id='$id'");	//Query the database for

//USE QUERIED INFO
printf("Number of rows: %d.\n", mysqli_num_rows($getlasttotal));				//Print number of rows for double checking the query

$i = 0;																									//Set initial interval value for loop

while($row = mysqli_fetch_assoc($getlasttotal))										//Associate the query with an array
{
	foreach($row as $fieldname => $fieldvalue)											//For each value in the array loop
	{
		$lasttotal[$i] = $row['donation_amount'];											//Setup array for echoing
    	echo "Donation total: $".$lasttotal[$i]."<br/>";									//Echo Array
		$i++;																							//Increment interval
    }  

}
echo "AVERAGE: ".$average = array_sum($lasttotal) / 60."<br/>";				//Get array average

//MANUAL OVERRIDE
$diff = $average;

//DIFFERENT IMAGE TIER
if ($diff >= 200) {
	$img = "/images/jigglypuff5.png";
	$width= "861";
} else if ($diff >= 0) {
	$img = "/images/jigglypuff4.png";
	$width="86";
} else if ($diff >= 0) {
	$img = "/images/jigglypuff3.png";
	$width="86";
} else if ($diff >= 0) {
	$img = "/images/jigglypuff2.png";
	$width="86";
} else if ($diff >= 0) {
	$img = "/images/jigglypuff.png";
	$width="86";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<html>
<head>
<meta http-equiv="refresh" content="60">											<!--Set refresh time in seconds-->
</head>
<body style="margin:0;padding:0;">
<div style="width:<?echo $width; ?>px;">
<img src="<?echo $img; ?>"/>
</div>
</body>
</html>
