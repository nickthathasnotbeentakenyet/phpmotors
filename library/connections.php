<?php
/*
* Proxy connection to the phpmotors database
*/

function phpmotorsConnect()
{
$server = 'mysql';
$dbname= 'phpmotors';
$username = 'iClient';
$password = 'bE_-@Ztm]hB!2Kac';
$dsn = "mysql:host=$server;dbname=$dbname";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

// Create the actual connection object and assign it to a variable
try {
    $link = new PDO($dsn, $username, $password, $options);
    // * This is for test only purposes *
    // if(is_object($link)){
    //     echo 'it works!';
    // }
return $link;    
} catch(PDOException $e) {
    // * This is for test only purposes *
    // echo "it did work ;(" . $e->getMessage();
header('Location: /phpmotors/view/500.php');
exit;
}
}
// * This is for test only purposes *
// phpmotorsConnect()
?>
