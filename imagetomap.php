<?php
session_start();
include 'inc/function.php';

if (isset($_FILES['thePhoto'])) {
    $thePhoto = $_FILES['thePhoto'];

    if ($thePhoto['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'img/companyphotos/';
        $fileName = time() . '_' . basename($thePhoto['name']);
        $uploadFile = $uploadDir . $fileName;

        $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
        $check = getimagesize($thePhoto['tmp_name']);

        if ($check !== false && in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            // Zorg dat map bestaat
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (move_uploaded_file($thePhoto['tmp_name'], $uploadFile)) {
                $_SESSION['companyPhoto'] = $fileName;

                // Je zou hier ook je database kunnen updaten als je wilt
                editcompany();

                // Redirect na succesvolle upload
                header("Location: dbuser.php");
                exit;
            } else {
                echo "<div class='failureMsg'>Failed to upload image.</div>";
            }
        } else {
            echo "<div class='failureMsg'>File is not a valid image.</div>";
        }
    } else {
        echo "<div class='failureMsg'>Error uploading file: " . $thePhoto['error'] . "</div>";
    }
}
?>
