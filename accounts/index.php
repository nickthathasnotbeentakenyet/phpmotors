<?php
/* 
* --------------------------------
* This is the Accounts Controller
* -------------------------------
*/

// Create or access a Session
session_start();


// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the functions library
require_once '../library/functions.php';

// Get the array of classifications
$classifications = getClassifications();

// var_dump($classifications);
// 	exit;

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
  $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'register':
    // Filter and store the data
    // The FILTER_SANITIZE_STRING removes any html elements and leaves only text
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    $existingEmail = checkExistingEmail($clientEmail);

    // Check for existing email address in the table
    if ($existingEmail) {
      $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
      include '../view/login.php';
      exit;
    }

    // Check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
      $message = '<p id="msgEmptyField">Please provide information for all empty form fields.</p>';
      include '../view/register.php';
      exit;
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

    // Check and report the result
    if ($regOutcome === 1) {

      setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');

      $_SESSION['message'] = "<p id=\"msgRegistered\">Thanks for registering <span class=\"msgName\">$clientFirstname</span>.<br> Please use your email and password to login.</p>";
      header('Location: /phpmotors/accounts/?action=login');
      $_SESSION['fullname'] = "$clientFirstname $clientLastname";
      exit;
    } else {
      $message = "<p id=\"msgUnregistered\">Sorry <span class=\"msgName\">$clientFirstname</span>, but the registration failed. Please try again.</p>";
      include '../view/register.php';
      exit;
    }
    break;
    // Login procedure
  case 'login-in':
    // Filter and store the data
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
    $clientEmail = checkEmail($clientEmail);
    $checkPassword = checkPassword($clientPassword);
    // Check for missing data
    if (empty($clientEmail) || empty($checkPassword)) {
      $message = '<p id="msgEmptyField">Please provide information for all empty form fields.</p>';
      include '../view/login.php';
      exit;
    }
    // A valid password exists, proceed with the login process
    // Query the client data based on the email address
    $clientData = getClient($clientEmail);
    // Compare the password just submitted against
    // the hashed password for the matching client
    $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
    // If the hashes don't match create an error
    // and return to the login view
    if (!$hashCheck) {
      $message = '<p class="notice">Please check your password and try again.</p>';
      include '../view/login.php';
      exit;
    }
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    // Remove the password from the array
    // the array_pop function removes the last
    // element from an array
    array_pop($clientData);
    // Store the array into the session
    $_SESSION['clientData'] = $clientData;
    // Send them to the admin view
    include '../view/admin.php';
    exit;
    // update account information procedure
  case 'updateAccountInfo':
    // Filter and store the data
    // The FILTER_SANITIZE_STRING removes any html elements and leaves only text
    $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
    $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
    $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    $clientEmail = checkEmail($clientEmail);
    $existingEmail = checkExistingEmail($clientEmail);

    // Check for existing email address in the table
    if ($clientEmail != $_SESSION['clientData']['clientEmail']) {
      if ($existingEmail) {
        $message = '<p id="msgEmptyField">That email address already exists.</p>';
        include '../view/client-update.php';
        exit;
      }
    }

    // Check for missing data
    if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
      $message = '<p id="msgEmptyField">Please provide information for all empty form fields.</p>';
      include '../view/client-update.php';
      break;
    }
    $updateResult = updateClient($clientFirstname, $clientLastname, $clientEmail, $clientId);
    if ($updateResult) {
      $clientData = getClientId($clientId);
      $_SESSION['clientData'] = $clientData;
      $message = "<p id=\"msgNewVehicle\">The account information has been successfully updated.</p>";
      $_SESSION['message'] = $message;
      include '../view/admin.php';
      exit;
    } else {
      $message = '<p id="emptyAddClass">Error. The account was not updated.</p>';
      include '../view/admin.php';
      exit;
    }
    break;

    // update password procedure
  case 'updatePassword':
    // Filter and store the data
    // The FILTER_SANITIZE_STRING removes any html elements and leaves only text
    $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
    $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
    $checkPassword = checkPassword($clientPassword);

    // Check for missing data
    if (empty($checkPassword)) {
      $messageNoPasswd = '<p id="msgEmptyField">Please provide password</p>';
      include '../view/client-update.php';
      exit;
    }

    // Hash the checked password
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    // Send the data to the model
    $updateResult = updatePassword($hashedPassword, $clientId);
    if ($updateResult) {
      $message = "<p id=\"msgNewVehicle\">The password has been successfully updated.</p>";
      $_SESSION['message'] = $message;
      include '../view/admin.php';
      exit;
    } else {
      $message = '<p id="emptyAddClass">Error. The password was not updated.</p>';
      include '../view/admin.php';
      exit;
    }
    break;
  case 'login':
    include '../view/login.php';
    break;
  case 'registerstration':
    include '../view/register.php';
    break;
  case 'admin':
    include '../view/admin.php';
    break;
  case 'logout':
    unset($_SESSION["clientData"]);
    session_destroy();
    header('Location: /phpmotors/');
    break;
  case 'updateAccount':
    include '../view/client-update.php';
    break;
}
