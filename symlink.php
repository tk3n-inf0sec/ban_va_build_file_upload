<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $filename = $_FILES['file']['name'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if ($ext !== "txt") {
        die("Only txt allowed");
    }

    $destination = "uploads/symlink/" . $filename;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
        echo "<pre>";
        echo file_get_contents($destination);
        echo "</pre>";
    } else {
        echo "Upload failed!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <button>Upload</button>
</form>