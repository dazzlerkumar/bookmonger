<?php
	include("include/connection.php");
?>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>BookMonger</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="css/index.css" />
      
   </head>
   <body style="background-color: #B4D7DB;">
          <div id="menu">
						<?php
							include("headermenu.php");
						?>
					</div>
      <!--Content goes here-->
      <div>
      <?php
      if(isset($_SESSION['UID'])){ 
        echo $_SESSION['NAME'];
      }

      ?>
      </div>
      <div><h1 align="center">Book Wall</h1></div>
      <div class="container">
      <div class="row rw-md-4 rw-sm-2"> 
        
      <?php
      
      if(isset($_SESSION['UID'])){ 
        $qry ="SELECT bname, img FROM book ORDER by bookid ASC";
        $resultset=mysqli_query($link,$qry);
     
        
        while($r=mysqli_fetch_assoc($resultset)){ 
            
            ?>
                                                 
                 <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                  <img class="img-thumbnail img-fluid" src="<?php echo $r['img'];?>" alt="No Image Found !" />
                  <h6 align="center"><?php echo $r['bname'];?></h6>
                                   </div>
                
        
      
      <?php
     }
    }
    else
      {
        header("location:loginpage.php");
      }
   ?>
  
   </div>
</div>
</body>
</html>