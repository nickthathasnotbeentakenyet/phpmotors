<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Management</title>
    <link rel="stylesheet" href="/phpmotors/css/small.css" type="text/css">
    <link rel="stylesheet" href="/phpmotors/css/large.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Gemunu+Libre:wght@300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="/phpmotors/images/site/tab-icon.png" type="image/x-icon">
    <script src="https://rawgit.com/thielicious/selectFile.js/master/selectFile.js"></script>
    <script src="../js/uploadimage.js"></script>
</head>

<body>
    <header id="page-header">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav id="page_nav">
        <?php echo getNavigationBar($carclassification); ?>
    </nav>
    <main class="imageUploadView">
        <h1>Image Management</h1>
        <p>Please choose one of the options presented below.</p>
        <h2>Add New Vehicle Image</h2>
        <?php
        if (isset($message)) {
            echo $message;
        } ?>

        <form action="/phpmotors/uploads/" method="post" enctype="multipart/form-data">
            <label for="invId">Vehicle</label>
            <?php echo $prodSelect; ?>
            <fieldset class="form_toggle">
                <label>Is this the <b id="TealColor">main</b> image for the vehicle?</label>
                <div class="form_toggle-item item-1">
                    <input type="radio" name="imgPrimary" id="priYes" value="1">
                    <label for="priYes">Yes</label>
                </div>
                <div class="form_toggle-item item-2">
                    <input type="radio" name="imgPrimary" id="priNo" checked value="0">
                    <label for="priNo">No</label>
                </div>
            </fieldset>
            <fieldset>
                <label for="choose" hidden>chose file</label>
                <input type=file hidden id=choose name="file1" accept=".jpg, .png">
                <input type=button onClick=getFile.simulate() value="Select File">
                <label id=selected>Nothing selected</label><br>
                <input type="submit" value="Upload" id="uploadImage">
                <input type="hidden" name="action" value="upload">
            </fieldset>
        </form>
        <hr>
        <h2>Manage Existing Images</h2>
        <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
        <?php
        if (isset($imageDisplay)) {
            echo $imageDisplay;
        } ?>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>
<?php unset($_SESSION['message']); ?>