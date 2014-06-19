<?php
require "../donate.thespeedgamers.com/admin/config.php";
require "../donate.thespeedgamers.com/admin/connect.php";

//GET TIME
date_default_timezone_set('America/Chicago'); 				// CDT
$current_date = date('Y-m-d H:i:s');					//Get current date and format it
$hour_date = date('Y-m-d H:i:s', strtotime($current_date . '-1 year'));	//Get current date MINUS a certain amount of time and format it		
echo $current_date."<br/>";					
echo $hour_date."<br/>";

//GET EVENT ID
$id =  $_GET['id']; 							//Pull the id value from the URL passed

//PULL EVENT XML
$url = "http://donate.thespeedgamers.com/xml/".$id.".xml"; 		//URL to the xml (http://donate.thespeedgamers.com/xml/5387eca6e9e13.xml)
$xmlChipin = simplexml_load_file($url);					//Load up the XML file for parsing
$donationtotal = $xmlChipin->collectedAmount;				//Parse the "collectedAmount" value from the XML

//QUERY FOR LAST TOTAL
$getlasttotal = $link->query("SELECT donation_amount FROM dc_donations WHERE dt >= '$hour_date' AND dt <= '$current_date' AND event_id='$id'");	//Query the database for

//USE QUERIED INFO
printf("Number of rows: %d.\n", mysqli_num_rows($getlasttotal));	//Print number of rows for double checking the query
									//Set initial interval value for loop
$i = 0
while($row = mysqli_fetch_assoc($getlasttotal))				//Associate the query with an array
{
	foreach($row as $fieldname => $fieldvalue)			//For each value in the array loop
	{
		$lasttotal[$i] = $row['donation_amount'];		//Setup array for echoing
    		echo "Donation total: $".$lasttotal[$i]."<br/>";		//Echo Array
	    	$i++;							//Increment interval
	}  

}

echo "AVERAGE: ".$average = array_sum($lasttotal)."<br/>";	  	//probably shouldnt average	//Get array average

//MANUAL OVERRIDE
$diff = $average;

//DIFFERENT IMAGE TIER
if ($diff >= 10000) {
    $img = "/images/meowth-32.png";
    $width= "500";
} else if ($diff >= 7926) {
    $img = "/images/meowth-31.png";
    $width="500";
} else if ($diff >= 6715) {
    $img = "/images/meowth-30.png";
    $width="500";
} else if ($diff >= 5233) {
    $img = "/images/meowth-29.png";
    $width="500";
} else if ($diff >= 4001) {
    $img = "/images/meowth-28.png";
    $width="500";
} else if ($diff >= 2986) {
    $img = "/images/meowth-27.png";
    $width="500";
} else if ($diff >= 2002) {
    $img = "/images/meowth-26.png";
    $width="500";
} else if ($diff >= 1501) {
    $img = "/images/meowth-25.png";
    $width="500";
} else if ($diff >= 1203) {
    $img = "/images/meowth-24.png";
    $width="500";
} else if ($diff >= 1000) {
    $img = "/images/meowth-23.png";
    $width="500";
} else if ($diff >= 781) {
    $img = "/images/meowth-22.png";
    $width="500";
} else if ($diff >= 666) {
    $img = "/images/meowth-21.png";
    $width="500";
} else if ($diff >= 567) {
    $img = "/images/meowth-20.png";
    $width="500";
} else if ($diff >= 476) {
    $img = "/images/meowth-19.png";
    $width="500";
} else if ($diff >= 400) {
    $img = "/images/meowth-18.png";
    $width="500";
} else if ($diff >= 341) {
    $img = "/images/meowth-17.png";
    $width="500";
} else if ($diff >= 298) {                           // this is the middle aka the average for 50k
    $img = "/images/meowth-16.png";
    $width="500";
} else if ($diff >= 285) {
    $img = "/images/meowth-15.png";
    $width="500";
} else if ($diff >= 250) {
    $img = "/images/meowth-14.png";
    $width="500";
} else if ($diff >= 227) {
    $img = "/images/meowth-13.png";
    $width="500";
} else if ($diff >= 202) {
    $img = "/images/meowth-12.png";
    $width="500";
} else if ($diff >= 176) {
    $img = "/images/meowth-11.png";
    $width="500";
} else if ($diff >= 140) {
    $img = "/images/meowth-10.png";
    $width="500";
} else if ($diff >= 118) {
    $img = "/images/meowth-09.png";
    $width="500";
} else if ($diff >= 93) {
    $img = "/images/meowth-08.png";
    $width="500";
} else if ($diff >= 66) {
    $img = "/images/meowth-07.png";
    $width="500";
} else if ($diff >= 42) {
    $img = "/images/meowth-06.png";
    $width="500";
} else if ($diff >= 31) {
    $img = "/images/meowth-05.png";
    $width="500";
} else if ($diff >= 23) {
    $img = "/images/meowth-04.png";
    $width="500";
} else if ($diff >= 11) {
    $img = "/images/meowth-03.png";
    $width="500";
} else if ($diff >= 1) {
    $img = "/images/meowth-02.png";
    $width="500";
} else if ($diff >= 0) {
    $img = "/images/meowth-01.png";
    $width="500";
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<html>
		<head>
			<meta http-equiv="refresh" content="60">	<!--Set refresh time in seconds-->
		</head>
		<body style="margin:0;padding:0;">
			<div style="width:<?echo $width; ?>px;">
				<img src="<?echo $img; ?>"/>
			</div>
		</body>
	</html>
