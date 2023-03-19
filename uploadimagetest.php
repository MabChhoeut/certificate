<?php
if(isset($_POST['submit'])){
    $photo_dir = "image/";
    $beleiimage_dir = "beleiimage/";
    $minimage_dir = "minimage/";

    // generate unique filenames for uploaded images
    $photo_file = $photo_dir . uniqid('photo_', true) . '.' . pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION);
    $beleiimage_file = $beleiimage_dir . uniqid('belei_', true) . '.' . pathinfo($_FILES["beleiimage"]["name"], PATHINFO_EXTENSION);
    $minimage_file = $minimage_dir . uniqid('min_', true) . '.' . pathinfo($_FILES["minimage"]["name"], PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    $photo_check = getimagesize($_FILES["photo"]["tmp_name"]);
    $beleiimage_check = getimagesize($_FILES["beleiimage"]["tmp_name"]);
    $minimage_check = getimagesize($_FILES["minimage"]["tmp_name"]);

    if($photo_check !== false && $beleiimage_check !== false && $minimage_check !== false) {
        move_uploaded_file($_FILES["photo"]["tmp_name"], $photo_file);
        move_uploaded_file($_FILES["beleiimage"]["tmp_name"], $beleiimage_file);
        move_uploaded_file($_FILES["minimage"]["tmp_name"], $minimage_file);
        echo "Images uploaded successfully.";
    } else {
        echo "File is not an image.";
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <label for="photo">Choose a photo:</label>
    <input type="file" name="photo" id="photo"><br>
    <label for="beleiimage">Choose a beleiimage:</label>
    <input type="file" name="beleiimage" id="beleiimage"><br>
    <label for="minimage">Choose a minimage:</label>
    <input type="file" name="minimage" id="minimage"><br>
    <input type="submit" name="submit" value="Upload">
</form>
