<?php

//  Insert a new review
function createReview($reviewText, $invId, $clientId)
{
    // Create a connection object using the phpmotors connection function
    $db = phpmotorsConnect();
    $sql = 'INSERT INTO reviews (reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//    get all reviews for a specific vehicle
function getAllReviews($invId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT reviews.reviewText, reviews.reviewDate, clients.clientFirstname, clients.clientLastname 
                FROM reviews 
            JOIN inventory ON reviews.invId = inventory.invId 
            JOIN clients ON reviews.clientId = clients.clientId
                WHERE reviews.invId = :invId ORDER BY reviews.reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviews;
}

// get all reviews for a specific user account

function getAccountReviews($clientId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT inventory.invId, inventory.invMake, inventory.invModel, reviews.reviewDate, reviews.reviewId 
            FROM reviews
            JOIN inventory ON reviews.invId = inventory.invId 
            WHERE clientId = :clientId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $accountReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $accountReviews;
}

// get a specific review
function getSpecificReview($reviewId)
{
    $db = phpmotorsConnect();
    $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $specReview = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $specReview;
}

// update a specific review
function updateReview($reviewText, $reviewId, $reviewDate)
{
    $db = phpmotorsConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText, reviewDate = :reviewDate
	 WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewDate', $reviewDate, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// delete a specific review
function deleteReview($reviewId)
{
    $db = phpmotorsConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}
