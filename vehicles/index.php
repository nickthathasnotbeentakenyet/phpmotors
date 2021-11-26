<?php
/* 
* --------------------------------
* This is the Vehicles Controller
* -------------------------------
*/

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the vehicles model
require_once '../model/vehicles-model.php';
// Get the functions library
require_once '../library/functions.php';
// Get the uploads model
require_once '../model/uploads-model.php';

// Get the array of classifications
$classifications = getClassifications();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
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
    if (empty($checkClassification)) {
      $message = '<p id="emptyAddClass">Please provide information for the empty form field.</p>';
      include '../view/add-classification.php';
      break;
    } else {
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
    if (empty($classificationId) || empty($checkColor) || empty($invDescription) || empty($invImage) || empty($invMake) || empty($invModel) || empty($checkPrice) || empty($checkStock) || empty($invThumbnail)) {
      $message = '<p id="emptyAddClass">Please provide information for all empty form fields.</p>';
      include '../view/add-vehicle.php';
      break;
    } else {
      // Send the data to the model
      $regOutVehicle = regVehicle($classificationId, $invColor, $invDescription, $invImage, $invMake, $invModel, $invPrice, $invStock, $invThumbnail);
      $message = '<p id="msgNewVehicle">New vehicle successfully added!.</p>';
      include '../view/add-vehicle.php';
      break;
    }
  case 'vehicle-management':
    include '../view/vehicle-management.php';
    exit;

    /* * ********************************** 
* Get vehicles by classificationId 
* Used for starting Update & Delete process 
* ********************************** */
  case 'getInventoryItems':
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId);
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray);
    break;
  case 'mod':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-update.php';
    // exit;
    break;

  case 'updateVehicle':
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
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    $checkPrice = checkPrice($invPrice);
    $checkStock = checkStock($invStock);
    $checkColor = checkColor($invColor);
    // Check for missing data
    if (empty($classificationId) || empty($checkColor) || empty($invDescription) || empty($invImage) || empty($invMake) || empty($invModel) || empty($checkPrice) || empty($checkStock) || empty($invThumbnail)) {
      $message = '<p id="emptyAddClass">Please provide information for all empty form fields.</p>';
      include '../view/vehicle-update.php';
      break;
    }

    $updateResult = updateVehicle($classificationId, $invColor, $invDescription, $invImage, $invMake, $invModel, $invPrice, $invStock, $invThumbnail, $invId);
    if ($updateResult) {
      $message = "<p id=\"msgNewVehicle\">Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = '<p id="emptyAddClass">Error. The vehicle was not updated.</p>';
      include '../view/vehicle-update.php';
      exit;
    }
    break;
  case 'del':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-delete.php';
    exit;
    break;
  case 'deleteVehicle':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = deleteVehicle($invId);
    if ($deleteResult) {
      $message = "<p id=\"msgNewVehicle\">The $invMake $invModel was successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p id='emptyAddClass'>Error: $invMake $invModel was not deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    }
    break;
  case 'classification':
    $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
    $vehicles = getVehiclesByClassification($classificationName);
    if (!count($vehicles)) {
      $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
    } else {
      $vehicleDisplay = buildVehiclesDisplay($vehicles);
    }
    include '../view/classification.php';
    break;
  case 'vehicleInfoPage':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
    $vehicleInfo = getSpecificVehicleInfo($invId);
    $thumbnailImages = getThumbnailImage($invId);
    if (!count($vehicleInfo)) {
      $message = "<p class='notice'>Sorry, no items found.</p>";
    } else {
      $vehicleDisplay = buildVehicleSpecInfo($vehicleInfo);
    }
    if (count($thumbnailImages)){
      $thumbsDisplay= buildVehicleSpecInfoThumbnailImages($thumbnailImages);
    }
    include '../view/vehicle-detail.php';
    break;
  default:
    $classificationList = buildClassificationList($classifications);
    include '../view/vehicle-management.php';
    break;
}
