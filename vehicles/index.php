<?php
/* 
* --------------------------------
* This is the Vehicles Controller
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
// Get the vehicles model
require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';
// -------------------------------------------- TEST BEGIN --------------------------------
// Get the array of classifications
$classifications = getClassifications();

// // Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//  $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';
// -------------------------------------------- TEST END ------------------------------------
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'add-classification':
      include '../view/add-classification.php';
      break;
    case 'add-vehicle':
        include '../view/add-vehicle.php';
        break;

    case 'addClassification':
        // Filter and store the data
          $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING));
          $checkClassification = checkClassification($classificationName);
      // Check for missing data
     if(empty($checkClassification)){
      $message = '<p id="emptyAddClass">Please provide information for the empty form field.</p>';
      include '../view/add-classification.php';
    break;
     } 
     else {
      header('Location: /phpmotors/vehicles/index.php');
     }

     // Send the data to the model
$regOutClass = regClassification($classificationName);

 case 'addVehicle':
   // Filter and store the data
     $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
     $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
     $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING)); 
     $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
     $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
     $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
     $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION));
     $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT));
     $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
     $checkPrice = checkPrice($invPrice);
     $checkStock = checkStock($invStock);
     $checkColor = checkColor($invColor);
 // Check for missing data
if(empty($classificationId) || empty($checkColor) || empty($invDescription) || empty($invImage) || empty($invMake) || empty($invModel) || empty($checkPrice) || empty($checkStock) || empty($invThumbnail)){
 $message = '<p id="emptyAddClass">Please provide information for all empty form fields.</p>';
 include '../view/add-vehicle.php';
 break; 
}
else {
  // Send the data to the model
  $regOutVehicle = regVehicle($classificationId, $invColor, $invDescription, $invImage, $invMake, $invModel, $invPrice, $invStock, $invThumbnail );
  $message = '<p id="msgNewVehicle">New vehicle successfully added!.</p>';
  include '../view/add-vehicle.php';
  break;
}
case 'vehicle-management':
  include '../view/vehicle-management.php';
  exit;

default:
  include '../view/vehicle-management.php';
}
