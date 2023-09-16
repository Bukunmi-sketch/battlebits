<?php
//namespace Users;
// require './Includes/db.inc.php';


/* The mafia_users class is a PHP class that handles various operations related to user management, such as
retrieving user information, checking if a user is followed, updating user profiles, and more. */
class Users
{

 /**
  * The constructor function initializes the  property with the provided  parameter.
  * 
  * @param conn The parameter `` is likely a database connection object or resource. It is used to
  * establish a connection to a database and perform database operations.
  */
  private $db;

  public function __construct($conn)
  {
    $this->db = $conn;
  }

 /**
  * The function getAllmafia_users retrieves the first names of all mafia_users from a database table called
  * "users".
  * 
  * @return an array with the key 'firstname' and the value of the 'firstname' column from the
  * 'users' table.
  */
  public function getAllUsers()
  {
    $sq = "SELECT firstname FROM mafia_users ";
    $stmt =  $this->db->query($sq);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $dataa) {
      return [
        'firstname' => $dataa['firstname']
      ];
    }
  }


 /**
  * The function `getuserinfo` retrieves user information from a database based on the provided user
  * ID.
  * 
  * @param userid The parameter "userid" is the unique identifier of the user for whom you want to
  * retrieve the information. It is used in the SQL query to filter the results and fetch the user's
  * data from the "users" table.
  * 
  * @return an array with the following keys and corresponding values:
  */
  public function getuserinfo($userid)
  {
    try {
      $sql = "SELECT * FROM mafia_users WHERE id=:userid";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(":userid", $userid);
      $stmt->execute();
      $returned_row = $stmt->fetch(pdo::FETCH_ASSOC);
      return [
        'id' => $returned_row['id'],
        'email' =>         $returned_row['email'],
        'playername' =>      $returned_row['playername'],
        'reg_step' =>      $returned_row['reg_step'],
        'date' =>      $returned_row['reg_date'],
        'profileimage' => $returned_row['profileimage'],
        'account_status' =>      $returned_row['account_status'],
        'bio' =>         $returned_row['bio'],
        'mobile' =>      $returned_row['mobile'],
        'mailotp' =>      $returned_row['mailotp'],
      ];
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }


  public function getRecentUsers()
  {
    $sql = "SELECT * FROM mafia_users  ORDER BY id ASC  LIMIT 5";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt;
  }


  public function getRandomUsers()
  {
    // $sql = "SELECT * FROM mafia_users WHERE RAND() <= 0.2 LIMIT 1;";
    $sql = "SELECT * FROM mafia_users ORDER BY RAND() LIMIT 1";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
   
    return $data['playername'];
    //  var_dump($data['playername']); 
  
  }


  /**
   * The function checks if a username is already taken by another user, excluding the current user's
   * session.
   * 
   * @param username The username parameter is the username that you want to check if it is already
   * used by another user in the database.
   * @param sessionid The sessionid parameter is the unique identifier for the current session. It is
   * used in the SQL query to exclude the current user from the check. This ensures that the username
   * being checked is not already in use by the current user.
   * 
   * @return a boolean value. If the username exists in the "users" table and the id is not equal
   * to the sessionid, then it returns false. Otherwise, it returns true.
   */
  public function EditCheckusername($username, $sessionid)
  {
    try {

      $sql = "SELECT * FROM mafia_users WHERE username =:username AND id!=:sessionid ";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':sessionid', $sessionid);
      $stmt->execute();
      // Check if row is actually returned
      if ($stmt->rowCount() > 0) {
        //  echo "username has been used";
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
  * The function checks if an email exists in the "users" table, excluding the row with the given
  * session ID.
  * 
  * @param email The email parameter is the email address that needs to be checked for uniqueness in
  * the database. It is used to query the "users" table and check if any other user with the same
  * email exists, excluding the user with the given sessionid.
  * @param sessionid The sessionid parameter is the unique identifier for the current session. It is
  * used to exclude the current user from the query results.
  * 
  * @return a boolean value. If the query returns any rows, it returns false. Otherwise, it returns
  * true.
  */
  public function EditCheckEmail($email, $sessionid)
  {
    try {

      $sql = "SELECT * FROM mafia_users WHERE email =:email AND id !=:sessionid ";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':sessionid', $sessionid);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return false;
      } else {
        return true;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }




 /**
  * The getUsersPost function retrieves the latest 5 posts from the database for a specific user.
  * 
  * @param userid The parameter "userid" is the ID of the user for whom you want to retrieve the posts.
  * 
  * @return the result of the executed SQL query, which is a statement object.
  */
  public function getUsersPost($userid)
  {
    $querypost = "SELECT * FROM posts INNER JOIN mafia_users ON users.id=posts.user_id WHERE user_id=:sessionid ORDER BY post_id DESC LIMIT 5";
    $stmt = $this->db->prepare($querypost);
    $stmt->bindParam(":sessionid", $userid);
    $stmt->execute();
    return $stmt;
  }





  public function updateProfile($dp, $firstname, $lastname, $username, $email, $biotext, $interest, $country, $website, $sessionid)
  {

    try {

      $dpsql = "UPDATE mafia_users SET profileimage=:image, firstname=:firstname, lastname=:lastname, username=:username, email=:email,Bio=:description, Country=:country, interest=:interest, website=:website WHERE id=:userid";

      $stmt = $this->db->prepare($dpsql);
      $stmt->bindParam(":image", $dp);
      $stmt->bindParam(":userid", $sessionid);
      $stmt->bindParam(":description", $biotext);
      $stmt->bindParam(":firstname", $firstname);
      $stmt->bindParam(":lastname", $lastname);
      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":country", $country);
      $stmt->bindParam(":interest", $interest);
      $stmt->bindParam(":website", $website);

      if ($stmt->execute()) {
        //return the mafia_users data and email will be the unique key                  
        /*       return [
                    'id' => $sessionid,  
                    'bio' => $biotext,
                    'image' => $dp
                        ];*/
        return true;
      } else {
        //   echo "error while inserting";
        return false;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }


  /**
   * The function `changepassword` updates the password of a user in the database with a new hashed
   * password.
   * 
   * @param sessionid The sessionid parameter is the unique identifier for the user whose password
   * needs to be changed. It is used to identify the specific user in the database and update their
   * password.
   * @param newpassword The new password that the user wants to change to.
   * 
   * @return a boolean value. If the password update is successful, it will return true. Otherwise, it
   * will return false.
   */
  public function changepassword($sessionid, $newpassword)
  {
    $user_hashed_newpassword = password_hash($newpassword, PASSWORD_DEFAULT);

    $query = "UPDATE mafia_users SET Password=:newpassword WHERE id=$sessionid ";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(":newpassword", $user_hashed_newpassword);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }


  /**
   * The deleteAccount function deletes a user account from the "users" table in a database using
   * the provided user ID.
   * 
   * @param userid The `userid` parameter is the unique identifier of the user account that you want to
   * delete from the `users` table.
   * 
   * @return the executed statement object.
   */
  public function deleteAccount($userid)
  {
    $sqldelete = 'DELETE FROM mafia_users WHERE id=:userid ';
    $stmt = $this->db->prepare($sqldelete);
    $stmt->bindParam(":userid", $userid);
    $stmt->execute();
    return $stmt;
  }




  

}


?>