<?php
/* 
* --------------------------------
* This is the Accounts Controller
* -------------------------------
*/

// start ------------------------------------------------
// Create or access a Session
session_start();
// end --------------------------------------------------


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
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// echo $navList;
// exit;

$action = filter_input(INPUT_POST, 'action');
 if ($action == NULL){
  $action = filter_input(INPUT_GET, 'action');
 }

 switch ($action){
  case 'register':
    // Filter and store the data
    // The FILTER_SANITIZE_STRING removes any html elements and leaves only text
      $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
      $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
      $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
      $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));
      $clientEmail = checkEmail($clientEmail);
      $checkPassword = checkPassword($clientPassword);

// start-----------------------------------------------------
      $existingEmail = checkExistingEmail($clientEmail);

      // Check for existing email address in the table
      if($existingEmail){
       $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
       include '../view/login.php';
       exit;
      }
// end -------------------------------------------------------


  // Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
  $message = '<p id="msgEmptyField">Please provide information for all empty form fields.</p>';
  include '../view/register.php';
  exit; 
 } 

// Hash the checked password
$hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
 // Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

// Check and report the result
if($regOutcome === 1){

  // start -----------------------------------------------------
  setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
  // end -------------------------------------------------------
  // start -----------------------------------------------------
  $_SESSION['message'] = "<p id=\"msgRegistered\">Thanks for registering <span class=\"msgName\">$clientFirstname</span>.<br> Please use your email and password to login.</p>";
  header('Location: /phpmotors/accounts/?action=login');
  // end -------------------------------------------------------
  // test ------------------------------------------------------
  $_SESSION['fullname'] = "$clientFirstname $clientLastname";
  // end test --------------------------------------------------
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
if( empty($clientEmail) || empty($checkPassword)){
$message = '<p id="msgEmptyField">Please provide information for all empty form fields.</p>';
include '../view/login.php';
exit; 
}

// start -----------------------------------------------------
// A valid password exists, proceed with the login process
// Query the client data based on the email address
$clientData = getClient($clientEmail);
// Compare the password just submitted against
// the hashed password for the matching client
$hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
// If the hashes don't match create an error
// and return to the login view
if(!$hashCheck) {
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
// end -------------------------------------------------------



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
}

?>