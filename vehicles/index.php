<?php
/* 
* --------------------------------
* This is the Vehicles Controller
* -------------------------------
*/

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles model
require_once '../model/vehicles-model.php';

// Get the array of classifications
$classifications = getClassifications();

// Build a navigation bar using the $classifications array
$navList = '<ul>';
$navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
foreach ($classifications as $classification) {
 $navList .= "<li><a href='/phpmotors/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
}
$navList .= '</ul>';

// Build a select drop-down menu using the $classifications array
$classificationList = "<br><label for='classificationId'>Select Classification</label><br>";
$classificationList .= "<select name='classificationId' id='classificationId' class='vehicleSelect'>";
// $classificationList .= "<option>Select Classification</option>";
foreach ($classifications as $classification) {
  $classificationList .= "<option  value='$classification[classificationId]'>$classification[classificationName]</option>";
}
$classificationList .= '</select>';

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
          $classificationName = filter_input(INPUT_POST, 'classificationName');
      // Check for missing data
     if(empty($classificationName)){
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
     $classificationId = filter_input(INPUT_POST, ('classificationId'));
     $invColor = filter_input(INPUT_POST, 'invColor');
     $invDescription = filter_input(INPUT_POST, 'invDescription');
     $invImage = filter_input(INPUT_POST, 'invImage');
     $invMake = filter_input(INPUT_POST, 'invMake');
     $invModel = filter_input(INPUT_POST, 'invModel');
     $invPrice = filter_input(INPUT_POST, 'invPrice');
     $invStock = filter_input(INPUT_POST, 'invStock');
     $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
 // Check for missing data
if(empty($classificationId) || empty($invColor) || empty($invDescription) || empty($invImage) || empty($invMake) || empty($invModel) || empty($invPrice) || empty($invStock) || empty($invThumbnail)){
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
