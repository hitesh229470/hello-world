<?php
		
	include 'student_DB.php';		

?>

<html>
<head>
<title>Student_information</title>
</head>

<body>
    
   
    <table border="1" cellpadding="1" cellspacing="1" align="center" enctype ="multipart/form-data">
      
    	<tr bgcolor="silver">
            
      	    <td>Student_Name</td>
            <td>Roll_No</td>
            <td>College</td>
            <td>Branch</td>
            <td>Semester</td>
            <td>Email</td>
            <td>Photo</td>
            <td>Gender</td>
            <td>Hobby</td>
            <td>Delete</td>
            <td>Update</td>
            
            
      </tr>

      <?php
      
	    $result= mysql_query("select * from stdtbl") or die(mysql_error());
	  
		  while($row = mysql_fetch_array($result))
                
            {
      
      		 ?>
      
		          <tr>
       		                
                    <td><?php echo $row['Student_Name']; ?></td>
                    <td><?php echo $row['Roll_No']; ?></td>
                    <td><?php echo $row['College']; ?></td>
                    <td><?php echo $row['Branch']; ?></td>
                    <td><?php echo $row['Semester']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><img src="images/<?php echo $row['Photo']; ?>" height="100" width="100"></td>
                    <td><?php echo $row['Gender'];?></td>
                    <td><?php echo $row['Hobby'];?></td>
                    <td><a href="s_delete.php?delid=<?php echo $row['id'];?>">Delete</a></td>
                    <td><a href="s_edit.php?editid=<?php echo $row['id'];?>">Edit</a></td>
                   
                  </tr>
		
                <?php		
			}
          	  ?>
    </table>
    
</body>
</html>