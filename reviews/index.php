<?php
/* 
* ---------------------------
* This is the reviews controller
* ---------------------------
*/
session_start();

require_once '../library/connections.php';
require_once '../model/main-model.php';
require_once '../model/vehicles-model.php';
require_once '../model/reviews-model.php';
require_once '../model/uploads-model.php';
require_once '../model/accounts-model.php';
require_once '../library/functions.php';

$classifications = getClassifications();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
  case 'newReview':
    $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
    $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
    if (isset($_SESSION['clientData']['clientId'])) {
      $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
    }
    if (empty($reviewText)) {
      $message = '<p id="emptyAddClass"> Review form is empty.</p>';
      include '../view/vehicle-detail.php';
      exit;
    } else {
      $outReview = createReview($reviewText, $invId, $clientId);
      if ($outReview){
      $message = '<p id="msgNewVehicle">The review has been successfully added!</p>';
      }
      $vehicleInfo = getSpecificVehicleInfo($invId);
      $thumbnailImages = getThumbnailImage($invId);
      $reviews = getAllReviews($invId);
      if (!count($vehicleInfo)) {
        $message = "<p class='notice'>Sorry, no items found.</p>";
      } else {
        $vehicleDisplay = buildVehicleSpecInfo($vehicleInfo);
        $displayReviews = buildReviewsDisplay($reviews);
      }
      if (count($thumbnailImages)) {
        $thumbsDisplay = buildVehicleSpecInfoThumbnailImages($thumbnailImages);
      }
      include '../view/vehicle-detail.php';
      exit;
    }
    break;
  case 'updateReview':
    $reviewDatetime = new DateTime('NOW');
    $reviewDate = $reviewDatetime->format('Y-m-d H:i:s');
    $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
    $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        // Check for missing data
        if (empty($reviewText)) {
          $message = '<p id="emptyAddClass">The form can\'t be empty</p>';
          include '../view/review-update.php';
          exit;
        }
    $upd = updateReview($reviewText, $reviewId, $reviewDate);
    if ($upd) {
        $message = "<p class='success'>The review was successfully updated.</p>";
    } else {
        $message = "<p class='failure'>The review was NOT updated.</p>";
    }
    $_SESSION['message'] = $message;
    header('location: /phpmotors/accounts/index.php?action=admin');
    break;
  case 'deleteReview':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_VALIDATE_INT);
        $remove = deleteReview($reviewId);
        if ($remove) {
            $message = "<p class='success'>The review was successfully deleted.</p>";
        } else {
            $message = "<p class='failure'>The review was NOT deleted.</p>";
        }
        $_SESSION['message'] = $message;
        header('location: /phpmotors/accounts/index.php?action=admin');
        break;
  case 'updateView':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
    $specReview = getSpecificReview($reviewId);
    $displaySpecReview=buildSpecReviewDisplay($specReview);
    include '../view/review-update.php';
    break;
  case 'deleteView':
    $reviewId = filter_input(INPUT_GET, 'reviewId', FILTER_VALIDATE_INT);
    $specReview = getSpecificReview($reviewId);
    $displaySpecReview=buildSpecReviewDisplay($specReview);
    include '../view/review-delete.php';
    break;    
  default:
    if (!$_SESSION['loggedin']) {
      header('Location: /phpmotors/');
    }
    include '../view/admin.php';
}
