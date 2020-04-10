<html>
     <head>
       <title>BookMonger</title>
       <link rel="stylesheet" href="css/styleindex.css"/>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

       </head>
<body class="text-center" style="background-color: #B4D7DB;">
 <div id="menu">
						<?php
							include("headermenu.php");
						?>
					</div>
 <form method="post" name="form_login" action="" >
      
      <div class="form-group">
       <h1 class="h3 font-weight-normal mb-4">Login</h1>
     </div>
      <div class="form-group">
        <input type="email" class="form-control " autofocus required name="mail" placeholder="Enter User Id or Email"/>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="pwd" placeholder="Enter Password"/>
      </div>
      <div class="form-group">
        <input type="checkbox" name="chk" value="Remember-me" /> Remember Me
      </div>
      <div class="form-group">
        <input class="btn btn-info btn-lg btn-block" type="submit" name="btn" value="Login"/>
      </div>
      <div class="form-group">
         <a href="registrationpage.php" class="h6 font-weight-normal mt-3 mb-8">Click Here, To Register Yourself </a>
      </div>
      <div class="form-group">
         <p class="text-muted mt-3">&copy; A Project by Deepak Kumar</p>
      </div>
</form>
  </body>
</html>
<?php
//session_start();

extract($_POST);
if(isset($btn)){
   
   
   if(!empty($_POST)){
     $email=$_POST['mail'];
     $pass=$_POST['pwd'];
     
    if(empty($email)){
        echo "No user found !!!";
    }
    elseif(empty($pass)){
        echo "Incorrect password";
    }
    else{
        
        $link=mysqli_connect('localhost','root','','bookmonger');
        $qry="select name,password,email from users where email='$mail' and password='$pwd'";
        $resultset=mysqli_query($link,$qry);
        
        $row=mysqli_fetch_assoc($resultset);
         
          if(!empty($row)){
                            
                            if($_POST['pwd']==$row['password']) {
                              
                               
                                $_SESSION['UID']=$row['email'];
                                $_SESSION['NAME']=$row['name'];
                                header("location:index.php");
                              
                            }
                            else{
                                echo 'Password is Wrong... Try Again';
                            }           
            
          }
          else{
            echo 'Invalid User';
          }
        
    }
   }
   else{
    header("location:loginpage.php");
   }
}



?>
