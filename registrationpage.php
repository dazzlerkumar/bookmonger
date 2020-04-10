<!DOCTYPE HTML>
<html>
<head>
	<title>Registration</title>
    <link rel="stylesheet" href="css/regcss.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
</head>
<body class="text-center" style="  background-color: #B4D7DB;">
                     
                   <div id="menu">
						<?php
							include("headermenu.php");
						?>
					</div>
<form name="reg_form" method="post" action="">
<div class="form-group">
<h1 class =" font-weight-normal mb-4">Create Account</h1>
</div>
  <div class="form-group"><label>Name</label>  
    <input name="fname" type="text" class ="form-control" autofocus  placeholder="Enter your name" required />
  </div>
  <div class="form-group"><label>Email </label>
     <input  name="mail" type="email" class ="form-control" required placeholder="Enter your Email"/></div>
  <div class="form-group"><label>Password</label> 
     <input name="pwd" type="password" class ="form-control"  required  placeholder="Enter your Password"/></div>
  <div class="form-group"><label>Confirm Password</label>
     <input name="cpwd" type="password" class ="form-control"  required  placeholder="Confirm Password"/></div>
  <div class="form-group"><label>Mobile Number</label> 
     <input name="mno" type="number" class ="form-control"  required  maxlength="10" placeholder="Enter Mobile Number"/></div>
  <div class="form-group"><label>City/Town </label>
     <input name="cty" type="text" class ="form-control"  required  placeholder="Enter your City/Town"/></div>
  <div class="form-group">
        <input class="btn btn-primary btn-lg btn-block " type="submit" name="btn" value="Sign up"/>
  </div>
</form>
</body>
</html>
<?php
session_start();

extract($_POST);
if(isset($btn)){
  
   
   
        if($_POST['pwd']!=$_POST['cpwd'])
		{
			echo "<li>Please Enter your Password Again.....";
		}
        else{
        $link =mysqli_connect('localhost','root','','bookmonger');
        $qry ="insert into users values('','$fname','$mail','$pwd','$mno','$cty')";
        $resultset = mysqli_query($link, $qry);       
        $row=mysqli_fetch_assoc($resultset);
        $_SESSION['UID']=$row['email'];
             if($resultset){
               echo "You're succefully registered";
               header("location:index.php");
               }      
            }
  }
?>
