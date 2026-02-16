<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = $_FILES['file'];
    $filename = $file['name'];

    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $allowed = ['jpg', 'png', 'gif'];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);

    $allowed_mime = ['image/jpeg', 'image/png', 'image/gif'];

    // sai logic: chỉ cần 1 trong 2 đúng
    if (!in_array($ext, $allowed) && !in_array($mime, $allowed_mime)) {
        die("Only images");
    }

    $destination = "uploads/double_ext/" . $filename;
    if (move_uploaded_file($file['tmp_name'], $destination)) {
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