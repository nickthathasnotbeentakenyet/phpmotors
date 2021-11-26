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
        <!-- <?php echo $navList; ?> -->
        <!-- <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/nav.php'; ?> -->
        <?php echo getNavigationBar($carclassification); ?>
    </nav>
    <main>
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
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>