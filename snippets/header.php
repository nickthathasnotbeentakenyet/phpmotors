    <div>
        <img src="/phpmotors/images/site/logo.png" alt="Delorian logo">
    </div>
    <div class="hright">
        <?php if (isset($_SESSION['loggedin'])) { echo '<a href="/phpmotors/accounts/index.php?action=admin" id="welcomeMessage">'; 
            if (isset($_SESSION['clientData']['clientFirstname'])) echo $_SESSION['clientData']['clientFirstname']; echo'</a>';}?>
        <?php if (!isset($_SESSION['loggedin'])) { echo '<a href="/phpmotors/accounts/index.php?action=login" id="myaccount">My Account</a>'; }?>
        <?php if (isset($_SESSION['loggedin'])) { echo '<a href="/phpmotors/accounts/index.php?action=logout" id="logout"> Logout</a>'; }?>
    </div>