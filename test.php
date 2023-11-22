<?php include ("connection_sql.php") ?>

<?php
    error_reporting(0);
    
    $msg = "";
    
    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
    
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "./img/" . $filename;
    
        
    
        // Get all the submitted data from the form
        $sql = "INSERT INTO test (test_img) VALUES ('$filename')";
    
        // Execute query
        mysqli_query($connect, $sql);
    
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>Restoran - Bootstrap Restaurant Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        
</head>
<body>
    
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>
    <div id="display-image">
        <?php
        $query = " SELECT * from test";
        $result = mysqli_query($connect, $query);
 
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <img src="./img/<?php echo $row['test_img']; ?>">
 
        <?php
        }
        ?>
    </div>





</body>
</html>

