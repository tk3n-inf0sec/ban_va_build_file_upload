<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $filename = $_FILES['file']['name'];

    // chặn đúng ".php"
    if (substr($filename, -4) === ".php") {
        die("PHP not allowed");
    }

    $destination = "uploads/case_sensitive/" . $filename;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
        echo "Uploaded: <a href='$destination'>$filename</a>";
    } else {
        echo "Upload failed!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button>Upload</button>
</form>