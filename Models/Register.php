<?php


// require './Includes/db.inc.php';

/* The Register class is used to handle user registration and related functions in a PHP
   application. */
class Register
{
  private $db;

  public function __construct($conn)
  {
    $this->db = $conn;
  }

 
  public function register( $playername, $email, $unique_id, $reg_step, $mailotp, $password, $date)
  {
    try {
      //hash the password;
      $user_hashed_password = password_hash($password, PASSWORD_DEFAULT);

      $sql = "INSERT INTO  mafia_users(unique_id, playername, email, reg_step,   mailotp, account_status, Password, reg_date)VALUES   (:unique_id,  :playername, :email, :reg_step, :mailotp,  :status, :password, :date)";
      $stmt = $this->db->prepare($sql);
      $result =  $stmt->execute([
        ":playername" => $playername,
        ":email" => $email,
        ":unique_id" => $unique_id,
        ":reg_step" => $reg_step,
        ":mailotp" => $mailotp,
        ":status" => 'pending',
        ":password" => $user_hashed_password,
        ":date" => $date
      ]);

      if ($result) {
        return true;
        //return the mafia_users data and email will be the unique key here                         
        /*    return [
                        'email' => $email,  
                        'firstname'=>  $firstname,  
                        'lastname' =>  $lastname  
                            ];
                            */
      } else {
        //   echo "error while inserting";
        return false;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }   //register()


  //if email already exist  //auth
  /**
   * The function "RegisterCheckemail" checks if an email address already exists in the "users"
   * table and returns true if it does not exist, and false if it does.
   * 
   * @param email The parameter "email" is a string that represents the email address that needs to be
   * checked for availability.
   * 
   * @return a boolean value. If the email exists in the "users" table, it will return false. If
   * the email does not exist, it will return true.
   */
  public function RegisterCheckemail($email)
  {
    try {

      $sql = "SELECT * FROM mafia_users WHERE email =:email";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      // Check if row is actually returned
      if ($stmt->rowCount() > 0) {
        //  echo "email has been used";
        return false;
      } else {
        //   echo 'continue to sign up';
        return true;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }



  /**
   * The function fetches registered details from the "users" table in the database based on the
   * provided email.
   * 
   * @param email The email parameter is the email address of the user whose details you want to fetch
   * from the "users" table.
   * 
   * @return an array with the following keys: 'id', 'firstname', 'email', 'lastname', 'date', and
   * 'password'. The values for these keys are fetched from the 'users' table in the database
   * based on the provided email. If no matching record is found, it returns false.
   */
  public function fetchRegisteredDetails($email)
  {
    try {

      $sql = "SELECT * FROM mafia_users WHERE email =:email";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {

        $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
          'id' =>        $returned_row['id'],
          'email' =>     $returned_row['email'],
          'playername' =>  $returned_row['playername'],
          'date' =>      $returned_row['reg_date'],
          'password' =>   $returned_row['password']
        ];
      } else {

        return false;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }




  /**
   * The function "RegisterCheckusername" checks if a given username already exists in the "users"
   * table and returns true if it does not exist, and false if it does.
   * 
   * @param playername The parameter "playername" is the playername that needs to be checked for availability
   * in the database.
   * 
   * @return a boolean value. If the playername exists in the "users" table, it will return false.
   * If the playername does not exist, it will return true.
   */
  public function RegisterCheckplayername($playername)
  {
    try {

      $sql = "SELECT * FROM mafia_users WHERE playername =:playername";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':playername', $playername);
      $stmt->execute();
      // Check if row is actually returned
      if ($stmt->rowCount() > 0) {
        //  echo "playername has been used";
        return false;
      } else {
        //   echo 'continue to sign up';
        return true;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }


 
 /**
  * The function updates the registration step and account status of a user in the database.
  * 
  * @param userid The userid parameter is the unique identifier of the user whose registration step
  * needs to be updated.
  * @param reg_step The reg_step parameter is the value that will be updated in the verification_blue
  * column of the mafia_users table. It represents the current registration step of the user.
  * 
  * @return a boolean value. If the execution of the SQL statement is successful, it will return true.
  * Otherwise, it will return false.
  */
  public function updateRegStep($userid, $reg_step)
  {
    $status = 'verified';
    $sql = "UPDATE mafia_users SET reg_step=:reg_step,account_status=:status WHERE id=:userid";
    $stmtupdate = $this->db->prepare($sql);
    $stmtupdate->bindParam(":userid", $userid);
    $stmtupdate->bindParam(":reg_step", $reg_step);
    $stmtupdate->bindParam(":status", $status);
    if ($stmtupdate->execute()) {
      return true;
    } else {
      return false;
    }
  }


 /**
  * The function "verifyEmail" checks if the provided mailotp matches the one stored in the database
  * for a given user.
  * 
  * @param userid The userid parameter is the unique identifier of the user whose email is being
  * verified. It is used to retrieve the user's information from the database.
  * @param mailotp The parameter "mailotp" is a verification code that is sent to the user's email
  * address. The user needs to enter this code to verify their email address.
  * 
  * @return a boolean value. It returns true if the entered mailotp matches the mailotp stored in the
  * database for the given userid. It returns false if the mailotp does not match or if there is an
  * error in executing the SQL query.
  */
  public function verifyEmail($userid, $mailotp)
  {
    try {

      $sql = "SELECT * FROM mafia_users WHERE id =:userid";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':userid', $userid);
      $stmt->execute();
      // Check if row is actually returned
      if ($stmt->rowCount() > 0) {
        //Return row as an array indexed by both column name
        $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);
        // Verify mailotp from database against entered mailotp
        if ($mailotp == $returned_row['mailotp']) {
          return true;
          //   echo 'it returned something true';
        } else {
          return false;
          //  echo 'nothing returned';
        }
      } else {
        return false;
        echo 'row is more than one';
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }




 /**
  * The function updates the mailotp field in the mafia_users table for a given email.
  * 
  * @param email The email parameter is the email address of the user to whom the OTP (One-Time
  * Password) will be sent.
  * @param mailotp The mailotp parameter is the one-time password that will be sent to the user's email
  * address.
  * 
  * @return a boolean value. If the execution of the SQL statement is successful, it will return true.
  * Otherwise, it will return false.
  */
  public function sendOtp($email, $mailotp)
  {
    $sql = "UPDATE mafia_users SET mailotp=:mailotp WHERE email=:email";
    $stmtupdate = $this->db->prepare($sql);
    $stmtupdate->bindParam(":mailotp", $mailotp);
    $stmtupdate->bindParam(":email", $email);
    if ($stmtupdate->execute()) {
      return true;
    } else {
      return false;
    }
  }









  


}  //login


?>