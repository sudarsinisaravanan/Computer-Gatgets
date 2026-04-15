<?php
	$con=new mySqli("localhost","root","","acom");
	//server name,username,password,database
	if(!$con=="")
	{
		echo "Db connected";
	}
	else
	{
		echo "not connected";
	}
?>