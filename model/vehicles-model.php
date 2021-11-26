<?php

/*
 * Vehicles Model
 */


//  Register a new classification
function regClassification($classificationName)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO carclassification (classificationName)
        VALUES (:classificationName)';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}


//  Register a new vehicle
function regVehicle($classificationId, $invColor, $invDescription, $invImage, $invMake, $invModel, $invPrice, $invStock, $invThumbnail)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'INSERT INTO inventory (classificationId, invColor, invDescription, invImage, invMake, invModel, invPrice, invStock, invThumbnail)
           VALUES (:classificationId, :invColor, :invDescription, :invImage, :invMake, :invModel, :invPrice, :invStock, :invThumbnail )';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_STR);
    $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}
// Get vehicles by classificationId 
function getInventoryByClassification($classificationId)
{
    $db = phpmotorsConnect();
    $sql = ' SELECT * FROM inventory WHERE classificationId = :classificationId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_INT);
    $stmt->execute();
    $inventory = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $inventory;
}

// Get vehicle information by invId
function getInvItemInfo($invId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $invInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
//  Update a vehicle
function updateVehicle($classificationId, $invColor, $invDescription, $invImage, $invMake, $invModel, $invPrice, $invStock, $invThumbnail, $invId)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'UPDATE inventory SET classificationId = :classificationId, invColor = :invColor, 
    invDescription = :invDescription, invImage = :invImage, invMake = :invMake, 
    invModel = :invModel, invPrice = :invPrice, invStock = :invStock, invThumbnail = :invThumbnail 
	 WHERE invId = :invId';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':classificationId', $classificationId, PDO::PARAM_STR);
    $stmt->bindValue(':invColor', $invColor, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invMake', $invMake, PDO::PARAM_STR);
    $stmt->bindValue(':invModel', $invModel, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}
//  Delete a vehicle
function deleteVehicle($invId)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    // The SQL statement
    $sql = 'DELETE FROM inventory WHERE invId = :invId';
    // Create the prepared statement using the phpmotors connection
    $stmt = $db->prepare($sql);
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    // Insert the data
    $stmt->execute();
    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();
    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}

// get a list of vehicles based on the classification
function getVehiclesByClassification($classificationName)
{
    // $db = phpmotorsConnect();
    // $sql = 'SELECT * FROM inventory WHERE classificationId IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName)';
    // $stmt = $db->prepare($sql);
    // $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    // $stmt->execute();
    // $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $stmt->closeCursor();
    // return $vehicles;

    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM images JOIN inventory ON inventory.invId = images.invId WHERE (imgPrimary LIKE 1 AND imgName LIKE "%-tn.%") AND inventory.classificationId IN (SELECT classificationId FROM carclassification WHERE classificationName = :classificationName)' ;
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':classificationName', $classificationName, PDO::PARAM_STR);
    $stmt->execute();
    $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicles;

}
// get all info about a specific inventory item (car)
function getSpecificVehicleInfo($invId)
{
    $db = phpmotorsConnect();
    // $sql = 'SELECT * FROM inventory, images WHERE inventory.invId = :invId'; // <---------------- added images, altered inventory.invId
    $sql = 'SELECT * FROM inventory JOIN images ON inventory.invId = images.invId WHERE inventory.invId = :invId AND (imgPrimary LIKE 1 AND imgName NOT LIKE "%-tn.%")';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $vehicleInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $vehicleInfo;
}
// Get information for all vehicles
function getVehicles()
{
    $db = phpmotorsConnect();
    $sql = 'SELECT invId, invMake, invModel FROM inventory';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $invInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $invInfo;
}
