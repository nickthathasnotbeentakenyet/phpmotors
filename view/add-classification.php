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
    <title>Add Classification | PHP Motors</title>
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
    <link rel="shortcut icon" href="/phpmotors/images/site/tab-icon.png" type="image/x-icon"></head>

<body>
    <header id="page-header">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    </header>
    <nav id="page_nav">
        <!-- <?php echo $navList; ?> -->
        <!-- <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?> -->
        <?php echo getNavigationBar($carclassification); ?>
    </nav>
    <main>
        <h1 class="vehicleManHeading">Add Classification</h1>
        <?php
            if (isset($message)) {
            echo $message;
            }
        ?>
        <div class="vehicleMan">
            <form action="/phpmotors/vehicles/index.php" method="post" class="addClassification">
                <label for="classificationName">Classification Name</label><br>
                <span class="hint">Please keep it limited up to 30 characters</span><br>
                <input type="text" name="classificationName" id="classificationName" required pattern="[a-zA-Z]{1,30}" placeholder="classification name"><br>
                <input type="submit" name="submit" id="addClassification" value="Add Classification">
                <input type="hidden" name="action" value="addClassification">
            </form>
        </div>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>