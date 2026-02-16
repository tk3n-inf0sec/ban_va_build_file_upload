<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $filename = $_FILES['file']['name'];

    // chỉ chặn .php
    if (strtolower(substr($filename, -4)) === '.php') {
        die("No PHP!");
    }

    $destination = "uploads/alt_extension/" . $filename;
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