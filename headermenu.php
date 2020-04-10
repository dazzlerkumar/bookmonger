
<html>
<head>
	<link rel="stylesheet" href="css/header.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"
        />
        
</head>
<body >
<div class="d-flex flex-md-row flex-column align-items-center border-bottom box-shadow p-2 mb-1" style="background-color: #60B1D6;">
<nav class="color:black;">
			<a href="index.php" class="h5 p-3 text-dark">Home</a>			
		    <a href="contact.php" class="h5 p-3 text-dark">Contact</a>
		    <a href="aboutus.php" class="h5 p-3 text-dark">About Us</a>
              <?php
              session_start();
					if(isset($_SESSION['UID']))
					{

						echo '<a href="uploadbook.php" class="h5 p-3 text-dark">Upload a Book</a>';
					}
					else
					{
						echo "";
					}
			    	if(isset($_SESSION['UID']))
					{

						echo '<a href="logout.php" class="h5 p-3 text-dark">Logout</a>';
					}
					else
					{
						echo "";
					}
			?>

</nav>

<h1 class="display-5 font-weight-normal my-0 ml-md-auto " >BookMonger</h1>
</div>
</body>

</html>
