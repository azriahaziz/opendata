<?php

$conn = mysql_connect("opendata.db.5605767.hostedresource.com","opendata","Apurba2014!");
 if( ! $conn )
 {
 	echo " database not connected";
 }
 else
 {
 	//echo " database connected";
 }
 
 if( ! mysql_select_db("opendata",$conn) )
{
 	echo " database not connected";
}
else
{ 
	//echo " database connected";
}


?>