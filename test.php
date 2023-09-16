<?php
require './Includes/db.inc.php';
$randomNumber = mt_rand() / mt_getrandmax();

// Adjust the probability (0.1 represents a 10% chance)
$probability = 0.1;

// if ($randomNumber <= $probability) {
    // If the random number is within the desired probability, fetch a random row
    $sql = "SELECT * FROM mafia_users ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        echo $data['playername'];
    } else {
        echo "No random row found.";
    }
// } else {
//     echo "Random row not selected.";
// }


?>