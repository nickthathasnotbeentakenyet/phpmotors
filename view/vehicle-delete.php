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
    <title><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
	elseif(isset($invMake) && isset($invModel)) { 
		echo "Delete $invMake $invModel"; }?> | PHP Motors</title>
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
        <h1 class="vehicleManHeading"><?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} 
elseif(isset($invMake) && isset($invModel)) { 
	echo "Delete$invMake $invModel"; }?></h1>
        <?php
            if (isset($message)) {
            echo $message;
            }
        ?>
        <div class="vehicleMan">
            <form action="/phpmotors/vehicles/index.php" method="post" class="addClassification">
                <?php echo $classificationList; ?><br>
                <label for="invMake">Make</label><br>
                <input type="text" name="invMake" id="invMake" <?php if(isset($invMake)){echo "value='$invMake'";} elseif(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> readonly placeholder="make"><br>
                <label for="invModel">Model</label><br>
                <input type="text" name="invModel" id="invModel" <?php if(isset($invModel)){echo "value='$invModel'";} elseif(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; } ?> readonly placeholder="model"><br>
                <label for="invDescription">Description</label><br>
                <textarea name="invDescription" id="invDescription" readonly ><?php if(isset($invDescription)){echo $invDescription;} elseif(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; } ?></textarea><br>
                <input type="submit" name="submit" id="addVehicle" value="Delete Vehicle">
                <input type="hidden" name="action" value="deleteVehicle">
                <!-- week9-2 ---------------------------------------------- -->
                <input type="hidden" name="invId" value="<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} 
                elseif(isset($invId)){ echo $invId; } ?>">
                <!-- week9-2 ---------------------------------------------- -->
            </form>
        </div>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>