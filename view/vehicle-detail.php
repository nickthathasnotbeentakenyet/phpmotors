<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $invMake; ?> Vehicles | PHP Motors</title>
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
        <section id="top">
        <?php if (isset($message)) {
            echo $message;
        }
        ?>
        <div id="detailed-container">
         <?php if (isset($thumbsDisplay)){
            echo '<div id="thumbsHiddenMobile">'; echo $thumbsDisplay; echo '</div>';
        }?>
        <?php if (isset($vehicleDisplay)) {
            echo $vehicleDisplay;
        } ?>
        </div>
        <?php if (isset($thumbsDisplay)){
            echo "<h2 id='thumbsH2'>Supplemental pictures</h2>";
            echo "<div id='thumbsHiddenDesktop'>"; echo $thumbsDisplay; echo "</div>";
        }?>
        </section>
        <hr>
        <section class="review" id="review">
        <h2>Customer Reviews</h2>
        <?php
         if (isset($msgNoReviews)) {
            echo $msgNoReviews;
          }
        if (isset($displayReviews)) {
            echo $displayReviews;
        } 
        ?>
        <?php
        if(!$_SESSION['loggedin']){     
        echo '<div class="flexyRight">';
        echo '<p id="reviewLogin"><a href="/phpmotors/accounts?action=login">Log in</a> to add a review</p>';
        echo '<a href="#top" class="updown"></a>';
        echo '</div>';
        echo '</section>';
        echo '</main>';
        exit;}
        ?>
        <h3>Add a Review</h3>
       <form action="/phpmotors/reviews/index.php" method="POST" class="review-form">
            <label for="screenname">Screen name</label><br>
            <input name="screenname" id="screenname" readonly value="<?php $Fname=($_SESSION['clientData']['clientFirstname']); echo $Fname[0]; echo $_SESSION['clientData']['clientLastname']; ?> "><br>
            <label for="reviewText">Review: </label><br>
            <textarea name="reviewText" id="reviewText" required></textarea><br>
            <div class="flexy">
            <input type="submit" name="submit" id="review-submit" value="Submit Review">
            <a href="#top" class="updown"></a>
            </div>
            <input type="hidden" name="action" value="newReview">
            <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} 
                elseif(isset($clientId)){ echo $clientId; } ?>">
            <input type="hidden" name="invId" value="<?php if(isset($invId)){ echo $invId; } ?>">
        </form>
        </section>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>