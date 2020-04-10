<?php
	include("include/connection.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Upload Book</title>
    <link rel="stylesheet" href="css/uploadbook.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
     integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
     <script type="text/javascript">
     function msg(){
        document.write("Your book has been uploaded succesfully.");
     }
     
     </script>
</head>
<body style="  background-color: #B4D7DB;">
                     <div id="menu">
						<?php
							include("headermenu.php");
						?>
					</div>
<div class="text-center">
 <form method="post" enctype="multipart/form-data">
      <div class="form-group ">
      <h1 class ="font-weight-normal mb-4">Upload Your Book</h1>
      </div>
      <div class="form-group"><label>Full Name of Book</label>
        <input type="text" class ="form-control" autofocus required name="bname" placeholder="Enter Book Name"/>
      </div>
      <div class="form-group"><label>Category</label>
         <select class="form-control " style="border-radius:25px;" name="slt">
            <option selected="true" disabled="true">~~Select A category~~</option>
            <option>Fiction</option>
             <option>Sci-Fiction</option>
              <option>Autobiography/Biography</option>
               <option>Textbook</option>
                <option>Self-Help</option>
         </select>
      </div>
      <div class="form-group"><label>Author </label>
        <input type="text" class ="form-control" required name="author" placeholder="Enter Author Name"/>
      </div>
      <div class="form-group"><label>Description</label>
        <textarea cols="40" rows="6" name="description" placeholder="Write a brief description"></textarea>
      </div>
      <div class="form-group"><label>Publisher</label>
        <input type="text" class ="form-control"  required name="pub"  placeholder="Publisher's Name"/>
      </div>
      <div class="form-group"><label>Edition </label>
        <input type="text" class ="form-control"  required name="edtn" placeholder="Enter Edition"/>
      </div>
      <div class="form-group"><label>ISBN</label>
        <input type="text" class ="form-control"  required name="isbn" max="13" placeholder="Enter ISBN"/>
      </div>
      <div class="form-group"><label>Pages </label>
        <input type="number" class ="form-control"  required name="pg"  placeholder="Enter Pages"/>
      </div>
      <div class="form-group-file"><label>Images </label>
        <input type="file" class ="form-control"  required name="bimg" />
      </div>
      <div class="form-group">
        <input class="btn btn-primary btn-lg btn-block " type="submit" name="btn1" value="Upload Book">
      </div>
 </form>
</div>
</body>
</html>
<?php
extract($_POST);

if(isset($btn1)){
    $imgpath=null;
    $filetype=$_FILES['bimg']['type'];
    if(strpos($filetype, 'jpeg')==false){
        echo "File should be an image....";
        }
        else{
            
         $tmppath=$_FILES['bimg']['tmp_name'];
         $finalpath=$_SERVER['DOCUMENT_ROOT']."bookmonger/bookimg/".$_FILES['bimg']['name'];
         //echo $finalpath;
         
        if($_FILES['bimg']['error']==0){
           move_uploaded_file($tmppath, $finalpath);        
        }
       $imgpath="bookimg/".$_FILES['bimg']['name'];
   }
    
    
    
  
    $qry="insert into book values('','$bname','$slt','$author','$description','$pub','$edtn','$isbn','$pg','$imgpath')";
    $resultset=mysqli_query($link, $qry);
    
    if($resultset){
       <script type="text/javascript">
        alert('You triggered an alert!')
       </script>
    }
}


?>