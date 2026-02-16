<?php
$upload_dir = __DIR__ . "/uploads/zipslip/";

if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}

if (isset($_FILES['zip'])) {
    $zip = new ZipArchive();

    if ($zip->open($_FILES['zip']['tmp_name']) === TRUE) {
        $zip->extractTo($upload_dir);
        $zip->close();
        echo "Extract done!";
    } else {
        echo "Zip error!";
    }
}
?>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="zip">
    <button>Upload</button>
</form>
