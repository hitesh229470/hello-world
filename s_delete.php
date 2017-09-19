<?php

	include 'student_DB.php';
	
	if(isset($_REQUEST["delid"]))
	{
		 $id= $_REQUEST["delid"];
		 mysql_query("delete from stdtbl where id='$id'") or die(mysql_error());
               
		 header('location:student_display.php');
	}

?>