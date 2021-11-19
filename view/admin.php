<?php 
if(!$_SESSION['loggedin']){
    header('Location: /phpmotors/');
   }
?><!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | PHP Motors</title>
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
    <main class="admin-view">
        <h1>Logged in as <?php echo $_SESSION['clientData']['clientFirstname']; echo" "; echo $_SESSION['clientData']['clientLastname']; ?></h1>
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
           } ?>
        <ul>
            <li>First name: <?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
            <li>Last name: <?php echo $_SESSION['clientData']['clientLastname']; ?></li>
            <li>Email: <?php echo $_SESSION['clientData']['clientEmail']; ?></li>
        </ul>
        <br>
        <h2>Account Management</h2>
        <a class="admin-link" href="/phpmotors/accounts/?action=updateAccount">Update account information</a>
        <br>
        <?php if($_SESSION['clientData']['clientLevel'] > 1)
        {echo '<h2>Inventory Management</h2>'; echo '<p>Use the following link to manage inventory</p>'; echo '<a class="admin-link" href="/phpmotors/vehicles/">Manage vehicles</a>'; }?>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>