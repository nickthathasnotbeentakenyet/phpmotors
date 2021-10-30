<?php
// ---------------------  All custom functions go here

// Check if an email is valid
function checkEmail($clientEmail)
{
   $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
   return $valEmail;
}

// Check the password for a minimum of 8 characters,
// at least one 1 capital letter, at least 1 number and
// at least 1 special character
// returns 1 if it matches the format, 0 if don't
function checkPassword($clientPassword)
{
   $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]\s])(?=.*[A-Z])(?=.*[a-z])(?:.{8,})$/';
   return preg_match($pattern, $clientPassword);
}
// Check if price for a new vehicle is digit or decimal
function checkPrice($invPrice)
{
   $pattern = '/^(\d+(\.\d{0,2})?|\.?\d{1,2})$/';
   return preg_match($pattern, $invPrice);
}
// Check if stock is a digit
function checkStock($invStock)
{
   $pattern = '/^\W?\d+$/';
   return preg_match($pattern, $invStock);
}
// Check if color is valid
function checkColor($invColor)
{
   $pattern = '/^[a-zA-Z]{1,}\W?\w*$/';
   return preg_match($pattern, $invColor);
}
// Check if classification name is less than 30 characters in length
function checkClassification($classificationName)
{
   $pattern = '/^[a-zA-Z]{1,30}$/';
   return preg_match($pattern, $classificationName);
}
// Get the array of classifications
$carclassification = getClassifications();
// Function to build Navigation Bar
function getNavigationBar($carclassification)
{
   $navList = '<ul>';
   $navList .= "<li><a href='/phpmotors/index.php' title='View the PHP Motors home page'>Home</a></li>";
   foreach ($carclassification as $classification) {
      $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
   }
   $navList .= '</ul>';
   return $navList;
}
