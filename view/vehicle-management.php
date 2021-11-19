<?php 
if(!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] == 1){
    header('Location: /phpmotors/');
    exit;
   }
   if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?><!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Management | PHP Motors</title>
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
        <?php echo getNavigationBar($carclassification); ?>
    </nav>
    <main>
        <h1 class=vehicleManHeading>Vehicle Management</h1>
        <div class="vehicleMan">
            <a href="/phpmotors/vehicles/index.php?action=add-classification">Add Classification</a><br>
            <a href="/phpmotors/vehicles/index.php?action=add-vehicle">Add Vehicle</a>
        </div>
                <?php
        if (isset($message)) { 
        echo $message; 
        } 
        if (isset($classificationList)) { 
        echo '<div class="veh-man-update">';
        echo '<h2 class="veh-man-updateH2">Vehicles By Classification</h2>'; 
        echo '<p>Choose a classification to see those vehicles</p>'; 
        echo $classificationList; 
        echo '</div>';
        }
        ?>
        <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
        </noscript>
        <table id="inventoryDisplay"></table>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
    <script src="../js/inventory.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>