<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | PHP Motors</title>
    <link rel="stylesheet" href="css/small.css" type="text/css">
    <link rel="stylesheet" href="css/large.css" type="text/css">
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
    <!-- <?php echo $navList; ?> -->
    <!-- <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?>  -->
    <?php echo getNavigationBar($carclassification); ?>
    </nav>
    <main>
        <section class="offersection">
            <h1>Welcome to PHP Motors !</h1>
            <div class="offer">
                <h2>DMC Delorean</h2>
                <p>3 cup holders<br>
                    Superman doors<br>
                    Fuzzy dice!
                </p>
                <div class="flex-offer">

                    <img src="/phpmotors/images/delorean.jpg" alt="delorean car image" class="flex-offer-item">
                </div>
                <input type="image" src="/phpmotors/images/site/own_today.png" class="offer-input" alt="button">
            </div>
        </section>
        <section class="upgradeReview">
            <div class="upgrades">
                <h2>Delorean Upgrades</h2>
                <div class="flex-container">
                    <div class="flex-item">
                        <img src="/phpmotors/images/upgrades/flux-cap.png" alt="flux cap">
                    </div>
                    <div class="flex-item">
                        <img src="/phpmotors/images/upgrades/flame.jpg" alt="flame">
                    </div>
                </div>
                <div class="flex-container">
                    <a href="#" class="flex-item, flex-padding">Flux Capacitor</a>
                    <a href="#" class="flex-item, flex-padding">Flame Decals</a>
                </div>
                <div class="flex-container">
                    <div class="flex-item">
                        <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="bumper sticker">
                    </div>
                    <div class="flex-item">
                        <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="hub cap">
                    </div>
                </div>
                <div class="flex-container">
                    <a href="#" class="flex-item, flex-padding">Bumper Stickers</a>
                    <a href="#" class="flex-item, flex-padding">Hub Caps</a>
                </div>
            </div>
            <div class="reviews">
                <h2>DMC Delorean Reviews</h2>
                <ul>
                    <li>"So fast its almost like traveing in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5) </li>
                    <li>"I'm feeling Marty McFly!" (5/5)</li>
                    <li>"The most futuristic ride of our day." (4.5/5)</li>
                    <li>"80's livin and I love it!" (5/5)</li>
                </ul>
            </div>
        </section>
    </main>
    <footer id="page-footer">
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>
