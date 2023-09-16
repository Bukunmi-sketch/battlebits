<?php

// require './Includes/db.inc.php';


/* The Auth class provides various methods for authentication and validation in PHP. */

class Auth
{
   /**
    * The function initializes a private variable called  with the value of the  parameter.
    * 
    * @param conn The parameter `` is likely a database connection object or resource. It is used
    * to establish a connection to a database and interact with it. The `__construct` method is a
    * constructor that is called when an object of this class is created. It takes the ``
    * parameter and assigns it
    */
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }


    /**
     * The function "escapeString" in PHP takes a string as input and returns the string with special
     * characters escaped.
     * 
     * @param biotext The parameter "biotext" is a string that represents the text that needs to be
     * escaped.
     * 
     * @return the escaped string.
     */
    public function escapeString($biotext)
    {
        $biotext = $this->db->quote($biotext);
        return $biotext;
    }

   
   /**
    * The function checks if the user is logged in by checking the value of the 'loggedin' key in the
    * session variable.
    * 
    * @return true if the value of ['loggedin'] is true.
    */
    public function isloggedin()
    {
        if ($_SESSION['loggedin'] == true) {
            return true;
        }
    }


   /**
    * The function custom_trim trims whitespace from a string, or returns an empty string if the input
    * is null.
    * 
    * @param value The parameter "value" is a nullable string.
    * 
    * @return the trimmed value of the input string, or an empty string if the input is null.
    */
    public function custom_trim(?string $value)
    {
        return trim($value ?? '');
    }


    /**
     * The function checks if a given string only contains valid letters (a-z, A-Z, hyphen, apostrophe,
     * and space).
     * 
     * @param name The parameter "name" is a string that represents a person's name.
     * 
     * @return a boolean value. If the name contains only valid letters (a-z, A-Z, hyphen, apostrophe,
     * and space), it will return true. Otherwise, it will return false.
     */
    public function validLetters($name)
    {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            return false;
        } else {
            return true;
        }
    }


    /**
     * The function redirects the user to a specified URL and terminates the script execution.
     * 
     * @param string url The URL where the user will be redirected to.
     */
    public function redirect(string $url): never
    {
        header('location:' . $url);
        exit();
    }

    
   /**
    * The function logs out a user by updating their account status to "offline" and destroying their
    * session.
    * 
    * @param sessionid The sessionid parameter is the unique identifier for the user's session. It is
    * used to update the account_status field in the database and to unset the session variable.
    * 
    * @return a boolean value of true if the execution of the SQL statement and session destruction is
    * successful.
    */
    public function logout($sessionid)
    {
        $sql2 = "UPDATE mafia_users SET account_status='offline' WHERE id=:sessionid ";
        $stmt = $this->db->prepare($sql2);
        $stmt->bindParam(":sessionid", $sessionid);
        if ($stmt->execute()) {
            session_destroy();
            //unset($_SESSION['id'] );
            unset($sessionid);
            return true;
        }
    }


   /**
    * The function "validate" in PHP trims, removes slashes, and converts special characters to HTML
    * entities in the input string.
    * 
    * @param input The input parameter is a string that needs to be validated.
    * 
    * @return the validated and sanitized input.
    */
    
    public function validate($input)
    {
        $input = trim($input ?? "");
        $input = stripslashes($input ?? "");
        $input = htmlspecialchars($input ?? '');
        return $input;
    }
    



   /**
    * The function "filteremail" checks if a given email address is valid or not.
    * 
    * @param string email The parameter "email" is a string that represents an email address.
    * 
    * @return a boolean value. If the email address passed as an argument is valid, the function will
    * return true. If the email address is invalid, the function will return false.
    */
    public function filteremail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            //  echo 'correct email address';
            return true;
        } else {
            //   echo "invalid email address";
            return false;
        }
    }



   /**
    * The function checks if the password and confirm password inputs match and returns true if they
    * do, and false if they don't.
    * 
    * @param password The password that the user entered.
    * @param confirmpass The parameter `` is the password entered by the user to confirm
    * their password.
    * 
    * @return a boolean value. If the password and confirm password match, it will return true. If they
    * do not match, it will return false.
    */
    public function matchpassword($password, $confirmpass)
    {
        if ($password !== $confirmpass) {
            //   echo "password does not match";
            return false;
        } else {
            //    echo "password is the same";
            return true;
        }
    }


    
   /**
    * The function checks if a password is at least 6 characters long and returns true if it is, and
    * false otherwise.
    * 
    * @param password The parameter "password" is a string that represents the password that needs to
    * be checked for its length.
    * 
    * @return a boolean value. If the length of the password is less than 6, it will return false.
    * Otherwise, it will return true.
    */
    public function passwordlength($password)
    {
        if (strlen($password) < 6) {
            // echo "password is too short";
            return false;
        } else {
            //  echo "password is appropriate";
            return true;
        }
    }


    //authenticate password
   /**
    * The authPassword function checks if the entered password matches the hashed password stored in
    * the database for a given user.
    * 
    * @param sessionid The sessionid parameter is the unique identifier for the user session. It is
    * used to retrieve the user's information from the database.
    * @param password The password parameter is the password entered by the user for authentication.
    * 
    * @return a boolean value. It returns true if the entered password matches the hashed password
    * stored in the database for the given user ID, and false otherwise.
    */
    public function authPassword($sessionid, $password)
    {
        try {

            $sql = "SELECT * FROM mafia_users WHERE id =:userid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':userid', $sessionid);
            $stmt->execute();
            // Check if row is actually returned
            if ($stmt->rowCount() > 0) {
                //Return row as an array indexed by both column name
                $returned_row = $stmt->fetch(PDO::FETCH_ASSOC);
                // Verify hashed password against entered password
                if (password_verify($password, $returned_row['password'])) {
                    return true;
                } else {

                    return false;
                }
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo  $e->getMessage();
        }
    }  //login



}



?>