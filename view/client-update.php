<?php 
if(!$_SESSION['loggedin']){
    header('Location: /phpmotors/');
   }
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Update | PHP Motors</title>
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
    <main class="login-page">
        <h1>Manage Account</h1>
        <section class="clientUpdate">
            <h2>Account Update</h2>
            <?php
            if (isset($message)) {
            echo $message;
            }
        ?>
            <form class="login-form" action="/phpmotors/accounts/index.php" method="post">
                <label for="clientFirstname">First name</label><br>
                <input type="text" name="clientFirstname" id="clientFirstname" value='<?php if(isset($_SESSION['clientData']['clientFirstname'])){ echo $_SESSION['clientData']['clientFirstname'];} ?>' required ><br>
                <label for="clientLastname">Last name</label><br>
                <input type="text" name="clientLastname" id="clientLastname" value='<?php if(isset($_SESSION['clientData']['clientLastname'])){ echo $_SESSION['clientData']['clientLastname'];} ?>' required ><br>
                <label for="clientEmail">Email</label><br>
                <input type="email" name="clientEmail" id="clientEmail" value="<?php if(isset($_SESSION['clientData']['clientEmail'])){ echo $_SESSION['clientData']['clientEmail'];} ?>" required ><br>
                <br>
                <input type="submit" name="submit" id="updClient" class="reg" value="Update Account">
                <input type="hidden" name="action" value="updateAccountInfo">
                <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} 
                elseif(isset($clientId)){ echo $clientId; } ?>">
            </form>
        </section>
        <br>
        <section class="clientUpdate">
            <h2>Password Update</h2>
            <?php
            if (isset($messageNoPasswd)) {
            echo $messageNoPasswd;
            }?>
            <form class="login-form" action="/phpmotors/accounts/index.php" method="post">
            <p id="clientupdateWarning">Updating the password will replace the existing one</p>
            <span class="hint">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
            <label for="clientPassword">Password</label><br>
            <input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <input type="submit" name="submit" id="updPasswd" class="reg" value="Change Password">
            <input type="hidden" name="action" value="updatePassword">
            <input type="hidden" name="clientId" value="<?php if(isset($_SESSION['clientData']['clientId'])){ echo $_SESSION['clientData']['clientId'];} 
                elseif(isset($clientId)){ echo $clientId; } ?>">
        </form>
        </section>
    </main>
    <footer id="page-footer">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    </footer>
</body>

</html>