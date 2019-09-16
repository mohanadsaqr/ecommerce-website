<?php
$_SESSION['username']="Admin";


?>


<html>
<head>
<link rel="stylesheet" href="style.css">
<title></title>
</head>
<body> 
<main>
<h2> Gallary </h2>
    
    
    
<div class="gallery-container">
    
    <?php 
    include_once'includes/dbh.inc.php';
    $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt , $sql))
    {
        echo"SQL statement fail";
    }else{
        mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            echo '<a href="#">
<div style ="backgound-img:url('.$row["imgFullNameGallery"].');"></div>  
<h3>'.$row["titleGallery"].'</h3>
<p>'.$row["descGallery"].'</p>
</a> ';
            
        }
    }

    ?>
</div>
<?php
    if(isset($_SESSION['username']))
      echo'<div class="gallery-upload">
    <form action="includes/gallery-upload.inc.php " method="post" enctype="multipart/form-data">
        <input type="text" name="filename" placeholder="File name...">
        <input type="text" name="filetitle" placeholder="Image title...">
        <input type="text" name="filedesc" placeholder="Image descreption...">
        <input type="file" name="file">
        <button type="submit" name="submit">UPLOAD</button>
        
    </form>
    </div>'  
     ?>
</main>    
</body>
</html>