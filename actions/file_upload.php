<?php 
    function file_upload($picture){
        $result = new stdClass(); //carries status from file upload
        $result->fileName = 'product.jpeg';
        $result->error = 1;
        //gather data from form
        $fileName = $picture["name"];
        $fileType = $picture["type"];
        $fileTmpName = $picture["tmp_name"];
        $fileError = $picture["error"];
        $fileSize = $picture["size"];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $filesAllowed = ["png", "jpg", "jpeg"];

    if ($fileError == 4){
        $result->ErrorMessage = "No picture was chosen. It can always be updated later.";
        return $result;
    } else {
        if (in_array($fileExtension, $filesAllowed)){
            if ($fileError === 0){
                if ($fileSize < 500000){
                    $fileNewName = uniqid('') . "." . $fileExtension;
                    $destination = "pictures/$fileNewName"; 
                    if (move_uploaded_file($fileTmpName, $destination)){
                        $result->error = 0;
                        $result->fileName = $fileNewName;
                        return $result;
                    } else {
                        $result->ErrorMessage = "There was an error uploading this file.";
                        return $result;
                    }
                    } else {
                        $result->ErrorMessage = "This picture is bigger than 500kb. <br> Please choose a smaller picture.";
                        return $result;
                    }
                    } else {
                        $result->ErrorMessage = "There was an error uploading - $fileError code. Check the PHP documentation.";
                        return $result;
                    }
                    } else {
                        $result->ErrorMessage = "This file type can't be uploaded.";
                        return $result;
                    }
                }
            }
?>