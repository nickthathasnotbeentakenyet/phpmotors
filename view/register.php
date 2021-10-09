<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Registration | PHP Motors</title>
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
    <main class="login-page">
        <h1>Register</h1>
        <form class="login-form">
            <label for="clientFirstname">First name</label><br>
            <input name="clientFirstname" id="clientFirstname" type="text" required placeholder="Jake"><br>
            <label for="clientLastname">Last name</label><br>
            <input name="clientLastname" id="clientLastname" type="text" required placeholder="Tompson"><br>
            <label for="clientEmail">Email</label><br>
            <input name="clientEmail" id="clientEmail" type="email" required placeholder="example@domain.com"><br>
            <label for="clientPassword">Password</label><br>
            <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </form>
        <button type="button" name="register" class="register-button">Register</button>
        <br>
        <br>
        <a href="/phpmotors/accounts/index.php?action=login">Login page</a>             
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>