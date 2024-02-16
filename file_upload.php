<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fileUpload"]) && $_FILES["fileUpload"]["error"] == UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ ."/file_uploads/";
        $fileName = $_FILES["fileUpload"]["name"];
        $fileTmpName = $_FILES["fileUpload"]["tmp_name"];
        $targetFilePath = $uploadDir . basename($fileName);
        
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "png","phd", "pdf");
        
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($fileTmpName, $targetFilePath)) {
                echo "The file ". htmlspecialchars(basename($fileName)). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, only JPG, PNG, and PDF files are allowed.";
        }
    } else {
        echo "No file uploaded or an error occurred during file upload.";
    }
}
?>
