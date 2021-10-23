<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle | PHP Motors</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Gemunu+Libre:wght@300&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" href="/phpmotors/images/site/logo.png" type="image/x-icon">
</head>

<body>
    <header id="page-header">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav id="page_nav">
        <?php echo $navList; ?>
        <!-- <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?> -->
    </nav>
    <main>
        <h1 class="vehicleManHeading">Add Vehicle</h1>
        <?php
            if (isset($message)) {
            echo $message;
            }
        ?>
        <div class="vehicleMan">
            <form action="/phpmotors/vehicles/index.php" method="post" class="addClassification">
                <?php echo $classificationList; ?><br>
                <label for="invMake">Make</label><br>
                <input type="text" name="invMake" id="invMake" placeholder="make"><br>
                <label for="invModel">Model</label><br>
                <input type="text" name="invModel" id="invModel" placeholder="model"><br>
                <label for="invDescription">Description</label><br>
                <textarea name="invDescription" id="invDescription"></textarea><br>
                <label for="invImage">Image</label><br>
                <input type="text" name="invImage" id="invImage" value="/images/no-image.png"
                    placeholder="/images/no-image.png"><br>
                <label for="invThumbnail">Thumbnail</label><br>
                <input type="text" name="invThumbnail" id="invThumbnail" value="/images/no-image.png"
                    placeholder="/images/no-image.png"><br>
                <label for="invPrice">Price</label><br>
                <input type="text" name="invPrice" id="invPrice" placeholder="$20000"><br>
                <label for="invStock">Stock</label><br>
                <input type="text" name="invStock" id="invStock" placeholder="3"><br>
                <label for="invColor">Color</label><br>
                <input type="text" name="invColor" id="invColor" placeholder="pink"><br>
                <input type="submit" name="submit" id="addVehicle" value="Add Vehicle">
                <input type="hidden" name="action" value="addVehicle">
            </form>
        </div>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>