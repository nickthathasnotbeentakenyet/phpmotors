<?php
    // Build a select drop-down menu using the $classifications array
    $classificationList = "<br><label for='classificationId'>Select Classification</label><br>";
    $classificationList .= "<select name='classificationId' id='classificationId' class='vehicleSelect' required>";
    $classificationList .= "<option value='' disabled selected>Not selected</option>";
    foreach ($classifications as $classification) {
        $classificationList .= "<option  value='$classification[classificationId]'";
        if (isset($classificationId)) {
            if ($classification['classificationId'] === $classificationId) {
                $classificationList .= ' selected ';
            }
        }
        $classificationList .= ">$classification[classificationName]</option>";
    }
    $classificationList .= '</select>';

?>
<?php 
if(!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] == 1){
    header('Location: /phpmotors/');
    exit;
   }
?><!DOCTYPE html>
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
    <link rel="shortcut icon" href="/phpmotors/images/site/tab-icon.png" type="image/x-icon">
</head>

<body>
    <header id="page-header">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav id="page_nav">
        <!-- <?php echo $navList; ?> -->
        <?php echo getNavigationBar($carclassification); ?>
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
                <input type="text" name="invMake" id="invMake" <?php if(isset($invMake)){echo "value='$invMake'";}  ?> required placeholder="make"><br>
                <label for="invModel">Model</label><br>
                <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";}  ?> required placeholder="model"><br>
                <label for="invDescription">Description</label><br>
                <textarea name="invDescription" id="invDescription" required><?php if(isset($invDescription)){echo $invDescription;}  ?></textarea><br>
                <label for="invImage">Image</label><br>
                <input type="text" name="invImage" id="invImage" <?php if(isset($invImage)){echo "value='$invImage'";}  ?> required value="/images/no-image.png"
                    placeholder="/images/no-image.png"><br>
                <label for="invThumbnail">Thumbnail</label><br>
                <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";}  ?> required value="/images/no-image.png"
                    placeholder="/images/no-image.png"><br>
                <label for="invPrice">Price</label><br>
                <input type="text" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";}  ?> required pattern="^\W?(\d+(\.\d{0,2})?|\.?\d{1,2})$" placeholder="$20000"><br>
                <label for="invStock">Stock</label><br>
                <input type="text" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";}  ?> required pattern="^\d+$" placeholder="3"><br>
                <label for="invColor">Color</label><br>
                <input type="text" name="invColor" id="invColor" <?php if(isset($invColor)){echo "value='$invColor'";}  ?> required pattern="^[a-zA-Z]{1,}\W?\w*$" placeholder="pink"><br>
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