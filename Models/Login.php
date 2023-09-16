<?php
//namespace Users;
// require './Includes/db.inc.php';


/* The Login class in PHP handles user login functionality, including verifying passwords, updating
user activity, and logging user data. */
class Login
{

   private $db;

   public function __construct($conn)
   {
      $this->db = $conn;
   }



   /**
    * The login function checks if a user exists in the database and verifies their password.
    * 
    * @param email The email parameter is the email address entered by the user during the login
    * process.
    * @param password The password parameter is the password entered by the user during the login
    * process.
    * 
    * @return an array with the following keys: 'id', 'firstname', 'email', 'lastname', 'date', and
    * 'password'.
    */
   public function login($email, $password)
   {
      try {

         $sql = "SELECT * FROM mafia_users WHERE email =:email";
         $stmt = $this->db->prepare($sql);
         $stmt->bindParam(':email', $email);
         $stmt->execute();
         // Check if row is actually returned
         if ($stmt->rowCount() > 0) {
            //Return row as an array indexed by both column name
            $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verify hashed password against entered password
            if (password_verify($password, $returned_row['password'])) {
               //define session if login was succesful
               return [
                  'id' =>        $returned_row['id'],
                  'playername' =>  $returned_row['playername'],
                  'email' =>     $returned_row['email'],
                  'date' =>      $returned_row['reg_date'],
                  'password' =>   $returned_row['password']
               ];

               echo "password is correct";
            } else {
               //   echo "incorrect password";
               return false;
            }
         } else {
            //    echo "user does not exist";
            return false;
         }
      } catch (PDOException $e) {
         echo  $e->getMessage();
      }
   }  //login


   /**
    * The function updates the status of a user to "online" in the database based on their session ID.
    * 
    * @param sessionid The sessionid parameter is the unique identifier for the user's session. It is
    * used to identify the specific user in the database and update their status to "online".
    * 
    * @return a boolean value. It returns true if the execution of the SQL query is successful, and it
    * does not return anything if the execution fails.
    */
   // public function loginSetStatusOnline($sessionid)
   // {
   //    $query = "UPDATE mafia_users SET Status='online' WHERE id=:sessionid ";
   //    $stmt = $this->db->prepare($query);
   //    $stmt->bindParam(":sessionid", $sessionid);
   //    if ($stmt->execute()) {
   //       return true;
   //    }
   // }






   /**
    * The function updates the last activity details of a user in the database.
    * 
    * @param sessionid The session ID of the user.
    * @param activitytime The time of the last activity.
    * @param activetime The parameter "activetime" is the time of the last activity.
    * @param activedate The "activedate" parameter is the date of the last activity.
    * @param datelastactivity The parameter "datelastactivity" is the date of the last activity
    * performed by the user.
    * 
    * @return a boolean value. If the execution of the SQL statement is successful, it will return
    * true.
    */
   public function lastActivity($sessionid, $activitytime, $activetime, $activedate, $datelastactivity)
   {
      $query = "UPDATE mafia_users SET LastActivity=:activitytime, LastActiveTime=:activetime, LastActiveDate=:activedate,DateLastActivity=:datelastactivity WHERE id=:sessionid ";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(":sessionid", $sessionid);
      $stmt->bindParam(":activitytime", $activitytime);
      $stmt->bindParam(":activetime", $activetime);
      $stmt->bindParam(":activedate", $activedate);
      $stmt->bindParam(":datelastactivity", $datelastactivity);
      if ($stmt->execute()) {
         return true;
      }
   }

  /**
   * The function updates the IP address and browser type of a user in the database based on their
   * session ID.
   * 
   * @param sessionid The sessionid parameter is the unique identifier for the user's session. It is
   * used to identify the specific session in the database.
   * @param ipaddress The IP address of the user.
   * @param browsertype The "browsertype" parameter represents the type of browser that the user is
   * using, such as Chrome, Firefox, Safari, etc.
   * 
   * @return a boolean value. If the execution of the SQL query is successful, it will return true.
   */
   public function usersLogData($sessionid, $ipaddress, $browsertype)
   {
      $query = "UPDATE mafia_users SET ip_address=:ipaddress, browser_type=:browser_type WHERE id=:sessionid ";
      $stmt = $this->db->prepare($query);
      $stmt->bindParam(":sessionid", $sessionid);
      $stmt->bindParam(":ipaddress", $ipaddress);
      $stmt->bindParam(":browser_type", $browsertype);
      if ($stmt->execute()) {
         return true;
      }
   }
}


?>
