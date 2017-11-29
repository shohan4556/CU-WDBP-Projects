<?php
require "../db.php";
if (isset($_POST)){
    $name = $_POST['name'];
    $dateofbirth = $_POST['dateofbirth'];
    $died = $_POST['died'];
    $details = mysqli_real_escape_string($conn,$_POST['details']);
    
    
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            $image =basename( $_FILES["image"]["name"]);
            $sql = "insert into `legends` (`legend_name`,`dateofbirth`,`died`,`legend_details`,`image`) VALUES('$name','$dateofbirth','$died','$details','$image')";
//    echo $sql;
//    die();
            if (mysqli_query($conn,$sql)){
                $_SESSION['msg'] = '<span class="text-success">Added.</span>';
                header("Location:".$_SERVER['HTTP_REFERER']);
            }else{
                $_SESSION['msg'] = '<span class="text-danger">Failed.</span>';
                header("Location:".$_SERVER['HTTP_REFERER']);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    
    
}