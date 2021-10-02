-- Query 1
INSERT 
    INTO clients (clientFirstname
    , clientLastname
    , clientEmail
    , clientPassword
    , comment) 
    VALUES ("Tony"
    , "Stark"
    , "tony@starkent.com"
    , "Iam1ronM@n"
    , "I am the real Ironman"
    ); 
-- Query 2
UPDATE clients 
    SET clientLevel = 3 
    WHERE clientFirstname = 'Tony'
        AND clientLastname = 'Stark';
-- Query 3
UPDATE inventory 
    SET invDescription = REPLACE (invDescription
                                , 'small interior'
                                ,'spacious interior')
    WHERE invMake = 'GM' 
        AND invModel = 'Hummer';
-- Query 4
SELECT i.invModel, c.classificationName 
    FROM inventory i 
INNER JOIN carclassification c ON c.classificationId=i.classificationId 
    WHERE c.classificationName='SUV';
-- Query 5
DELETE 
    FROM inventory 
    WHERE invMake = 'Jeep' 
        AND invModel = 'Wrangler';
-- Query 6
UPDATE inventory 
    SET invImage = CONCAT("/phpmotors",invImage), invThumbnail = CONCAT ("/phpmotors",invThumbnail);
