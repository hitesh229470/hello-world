
<?php

        session_start();
        
        include 'student_DB.php';

		if(isset($_REQUEST["sub"]))	
	        {
		
                  $sname1=$_REQUEST['sname'];
		  $rno1=$_REQUEST['rno'];
		  $cname1=$_REQUEST['cname'];
		  $branch1=$_REQUEST['branch'];
		  $sem1=$_REQUEST['sem'];
		  $email1=$_REQUEST['email'];
		  $gender1=$_REQUEST['gender'];
                
            $hobby1=$_REQUEST['chk'];
            $h1= implode(",", $hobby1);             
                
            $image1=$_FILES['img']['name'];
	      //$type=$_FILES["img"]["type"];
       		$temp=$_FILES["img"]["tmp_name"];
       
       		$path= "images/$image1";
             
             move_uploaded_file($temp,$path);


    if(empty($_SESSION['captcha_code'] ) || strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
    {  
        $msg = "<span style='color:red'>The Captcha code does not match!</span>";  

    }
    else
    {     
       mysql_query("insert into stdtbl(Student_Name,Roll_No,College,Branch,Semester,Email,Photo,Gender,Hobby) values('$sname1','$rno1','$cname1','$branch1','$sem1','$email1','$image1','$gender1','$h1')") or die(mysql_error());

       header('location:student_display.php');   
    }              

}

?>

<!DOCTYPE html >
<html>
<head>

<link href="./css/style.css" rel="stylesheet">

<script type='text/javascript'>

function refreshCaptcha()
{
    var img = document.images['captchaimg'];
    img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;

}

</script>

<title>Student_information</title>
</head>

<body>
    
    <form method="post" id="form1" name="form1" action="" enctype ="multipart/form-data">

        <table border="1" cellpadding="3" cellspacing="8" align="center">
           
		    <tr>
                <td>Student Name</td>
                <td><input type="text" id="sname" name="sname" required autofocus/></td>
            </tr>

            <tr>
                <td>Roll No:</td>
                <td><input type="number" id="rno" name="rno" required/></td>
            </tr>
            
            <tr>
                <td>College Name:</td>
                <td><input type="text" id="cname" name="cname" required /></td>
            </tr>    

            <tr>
                <td>Branch Name:</td>
                <td><select  id="branch" name="branch">
                    <option value="CSE">CSE</option>
                    <option value="MECH">MECH</option>
                    <option value="EC">EC</option>
                   </select>
                </td>
            </tr>     
            
            <tr>        
               <td>Semester</td>
		   	   <td><select id="sem" name="sem">
 		        <option value="SEM-1">SEM-1</option>
  		        <option value="SEM-2">SEM-2</option>
  		        <option value="SEM-3">SEM-3</option>
  		        <option value="SEM-4">SEM-4</option>
     	        <option value="SEM-5">SEM-5</option>
  		        <option value="SEM-6">SEM-6</option>
                </select></td>
            </tr>
            
            <tr>
                <td>Email Id:</td>
                <td><input type="email" id="email" name="email" required/></td>   
            </tr>    

            <tr>
                <td>Profile Photo:</td>
                <td><input type="file" id="img" name="img"/></td>
            </tr>
            
            
            <tr>
                <td>Gender:</td>
                <td><input type="radio" id="gender" name="gender" value="Male" checked=""/>Male
                    <input type="radio" id="gender" name="gender" value="Female" />Female
                </td>
            </tr>

            
            <tr>
                <td>Hobby:</td>
                <td><input type="checkbox" name="chk[]" value="cricket">Cricket
                    <input type="checkbox" name="chk[]" value="reading">Reading
                    <input type="checkbox" name="chk[]" value="surfing">Surfing
                </td>
            </tr>  
            
           <tr>
                <td>Enter Captcha:</td>
                <td><img src="captcha.php?rand=<?php echo rand();?>" id='captchaimg'><br>
                    
                    
                <input type="text" id="captcha_code" name="captcha_code" required>
                <br>
                Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.</td>

            </tr>

                       
            <tr>
              <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
            </tr> 

           
             <tr >
            <td colspan="2" align="center"><input type="submit" id="sub" name="sub" value="submit" onclick="return validate();" /></td>
            </tr>
            
        </table>  
</form>
</body>
</html>