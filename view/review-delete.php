<?php 
if(!$_SESSION['loggedin']){
    header('Location: /phpmotors/');
    exit;
   }
?><!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Review | PHP Motors</title>
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
        <h1 class="vehicleManHeading">Delete Review</h1>
        <p id="emptyAddClass">Are you sure you want to delete? This action is permanent</p>
        <?php
            if (isset($message)) {
            echo $message;
            }
        ?>
        <div class="vehicleMan">
            <form action="/phpmotors/reviews/index.php" method="post" class="addClassification"> 
                <label for="reviewText">Review Text</label><br>
                <textarea name="reviewText" id="reviewText" readonly ><?php if(isset($displaySpecReview)){echo $displaySpecReview;} ?></textarea><br>
                <input type="submit" name="submit" id="addVehicle" value="Delete Review">
                <input type="hidden" name="action" value="deleteReview">
                <input type="hidden" name="reviewId" value="<?php if(isset($specReview['reviewId'])){ echo $specReview['reviewId'];} 
                elseif(isset($reviewId)){ echo $reviewId; } ?>">
            </form>
        </div>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>