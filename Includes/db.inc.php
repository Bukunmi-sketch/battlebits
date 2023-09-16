<?php

  /* The code block you provided is defining variables that are used to establish a connection to a
  MySQL database. */
   $servername = "localhost";
   $dbname= "mafia";
   $username= "root";
   $password = "";

 
  // $servername="fdb26.awardspace.net";
  // $username="3320362_hmm";
  // $password="Computer19";
  // $dbname="3320362_hmm";


  /* The code block you provided is establishing a connection to a MySQL database using PHP's PDO (PHP
  Data Objects) extension. */
   try{
    $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($conn){
      //  echo "connected succesfully";
       // echo "<br>";
    }
    else{
     //   echo "can't connect";
    }

  }
   catch(PDOException $e){
       echo "error while connecting to the database" .  $e->getMessage() ;
   }

   

    



?>