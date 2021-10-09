<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login | PHP Motors</title>
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
        <h1>Sign in</h1>
        <form class="login-form">
            <label for="clientEmail">Email</label><br>
            <input name="clientEmail" id="clientEmail" type="email" required placeholder="example@domain.com"><br>
            <label for="clientPassword">Password</label><br>
            <input name="clientPassword" id="clientPassword" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </form>
        <input type="submit" name="submit" class="login-submit" value="Sing-in">
        <p>Not a member yet?</p>
        <button type="button" name="register" class="register-button" onclick="location.href='/phpmotors/accounts/index.php?action=register'">Register</button>     
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>