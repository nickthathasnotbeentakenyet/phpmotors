<?php
/* 
* --------------------------------
* This is the Accounts Controller
* -------------------------------
*/

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
  $message = "<p id=\"msgRegistered\">Thanks for registering <span class=\"msgName\">$clientFirstname</span>.<br> Please use your email and password to login.</p>";
  include '../view/login.php';
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
break;
 case 'login':
  include '../view/login.php';
  break;
 case 'registerstration':
  include '../view/register.php';
  break;
}

?>