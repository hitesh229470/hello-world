
<?php

				include 'student_DB.php';
	
				if(isset($_REQUEST["editid"]))
				{
					$updateid= $_REQUEST['editid'];
					$result= mysql_query("select * from stdtbl where id='$updateid' ") or die(mysql_error());
                                       
					$row= mysql_fetch_array($result);
	   		   	    
					$br= $row["Branch"]; // for if codition in select value
					$gend= $row["Gender"];  // for if codition in select value
					$sem2= $row["Semester"];// for if codition in select value
		
				}
	
				if(isset($_REQUEST["update"]))	
				{
	
					$sname1=$_REQUEST['sname'];
					$rno1=$_REQUEST['rno'];
					$cname1=$_REQUEST['cname'];
					$branch1=$_REQUEST['branch'];
					$sem1=$_REQUEST['sem'];
					$email1=$_REQUEST['email'];
                                        
                    $image1 = $_FILES['img']['name'];
                   	$tmp=$_FILES['img']['tmp_name'];
                         
                    $path="images/".$image1;
                    move_uploaded_file($tmp,$path);
                                        
					$gender1=$_REQUEST['gender'];
					
                        $hobby1=$_REQUEST['chk'];
                        $h=implode(",",$hobby1);
      
                                         
					
// $sql =mysql_query("update into stdtbl set(Student_Name='$sname1',Roll_No='$rno1',College='$cname1',Branch='$branch1',Semester='$sem1',Email='$email1',Photo='$image1',Gender='$gender1',Hobby='$h' where id='$updateid'") or die(mysql_error());

 $sql = "UPDATE 'stdtbl' SET 'Student_Name'='$sname1',`Roll_No`='$rno1',`College`='$cname1',`Branch`='$branch1',`Semester`='$sem1',`Email`='$email1',`Photo`='$image1',`Gender`='$gender1',`Hobby`='$h' WHERE id='$updateid'";
					 

					mysql_query($sql);

					header('location:student_display.php');       
		
				}
?>

<html >
<head>
<title>Student_information</title>
</head>

<body>

<form method="post" id="form" enctype="multipart/form-data" action="">

<table border="1" align="center" cellspacing="1" cellpadding="5">
    <tr>
        <td>Student Name:</td>
        <td><input type="text" id="sname" name="sname" value="<?php echo $row["Student_Name"];?>"/></td>        
    </tr>    

    <tr>
        <td>Roll No:</td>
        <td><input type="text" id="rno" name="rno" value="<?php echo $row["Roll_No"];?>"/></td>
    </tr>    

    <tr>
        <td>College Name:</td>
        <td><input type="text" id="cname" name="cname" value="<?php echo $row["College"];?>"/></td>
    </tr>    

	<tr>
		<td>Branch Name:</td>
		<td><select  id="branch" name="branch">
	       <option value="CSE" <?php if($br=='CSE') echo "selected";?>>CSE</option>
           <option value="MECH" <?php if($br=='MECH') echo "selected";?>>Mech</option>
           <option value="EC" <?php if($br=='EC') echo "selected";?>>EC</option>
         </select></td>
   	</tr>


	<tr>
		<td>Semester:</td>
		<td><select id="sem" name="sem">
		  <option value="SEM-1" <?php if($sem2=='SEM-1') echo "selected";?>>SEM-1</option>
		  <option value="SEM-2" <?php if($sem2=='SEM-2') echo "selected";?>>SEM-2</option>
		  <option value="SEM-3" <?php if($sem2=='SEM-3') echo "selected";?>>SEM-3</option>
		  <option value="SEM-4" <?php if($sem2=='SEM-4') echo "selected";?>>SEM-4</option>
		  <option value="SEM-5" <?php if($sem2=='SEM-5') echo "selected";?>>SEM-5</option>
		  <option value="SEM-6" <?php if($sem2=='SEM-6') echo "selected";?>>SEM-6</option>
		</select></td>
	</tr>
	
	<tr>	
		<td>Email Id:</td>
		<td><input type="text" id="email" name="email" value="<?php echo $row["Email"];?>"/></td>
	</tr>	

	<tr>
		<td>Profile Photo:</td>
		<td><input type="file" name="img"> 
			<?php echo $row["Photo"];?></td>
	</tr>	       


	<tr>
		<td>Gender:</td>
   		<td><input type="radio" id="gender" name="gender" value="Male" <?php if($row[8]=='Male'){ ?> checked="checked" <?php }?>/> Male
   		<input type="radio" id="gender" name="gender" value="Female" <?php if($row[8]=='Female'){ ?> checked="checked" <?php }?>/> Female</td>
	</tr>

	<tr>
	<td>Hobby:</td>
    <td><?php
  		 $e= explode(",", $row['Hobby']);
  		 if(in_array("cricket",$e))
  		 {
    	    $c="t";
        
   		}        
			 else 
 	    {
      		 $c="f";
   	    }
 			 if(in_array("reading",$e))
 	   {
     		 $r="t";
  		}
 		else
 	    {
 	         $r="f";
      
     	}
   		if(in_array("surfing",$e))
   		{
   		    $s="t";
   		}    
 		else
 	    {
     
 	      $s="f";
 	    }
	?>

	<input type="checkbox" name="chk[]" value="cricket" <?php if($c=='t'){?> checked="checked"<?php } ?>>Cricket<br>
	<input type="checkbox" name="chk[]" value="reading" <?php if($r=='t'){?> checked="checked"<?php } ?>>Reading<br>
	<input type="checkbox" name="chk[]" value="surfing" <?php if($s=='t'){?> checked="checked"<?php } ?>>Surfing<br>
	</td>
	</tr>

	<tr>
	<td colspan="2" align="center"><input type="submit" id="update" name="update" value="Update"/></td>
	</tr>   

</table>
</form>
</body>
</html>