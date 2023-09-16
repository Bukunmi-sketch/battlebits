<?php

// require '../Includes/db.inc.php';


class Uploadimg
{
  private $db;

  public function __construct($conn)
  {
    $this->db = $conn;
  }


  /**
   * The function "imgextension" checks if the file extension of a given file path is either "png",
   * "jpeg", or "jpg".
   * 
   * @param dp The parameter `` is the file path or name that you want to check the extension for.
   * 
   * @return a boolean value. If the image extension is in the array of allowed extensions (png, jpeg,
   * jpg), it will return true. Otherwise, it will return false.
   */
  public function imgextension($dp)
  {
    $img_explode = explode('.', $dp);
    $img_ext = end($img_explode);
    $extensions = ['png', 'jpeg', 'jpg'];

    if (in_array($img_ext, $extensions) == true) {
      return true;
      //  echo "file is correct";
    } else {
      //echo "file must be png,jpg or jpeg";
      return false;
    }
  }



  /**
   * The function checks if an image size is larger than 900,000 bytes and returns true if it is not,
   * and false if it is.
   * 
   * @param imagesize The parameter "imagesize" represents the size of an image file in bytes.
   * 
   * @return a boolean value. If the  is greater than 900000, it will return false.
   * Otherwise, it will return true.
   */
  public function largeImage($imagesize)
  {

    if ($imagesize > 900000) {
      //  echo "file is to large";
      return false;
    } else {
      //  echo 'file is okay';
      return true;
    }
  }




 /**
  * The function moveImage takes an image file and a destination directory as parameters, and attempts
  * to move the image file to the specified directory, returning true if successful and false
  * otherwise.
  * 
  * @param imgtmp The temporary location of the uploaded image file.
  * @param dirfile The destination directory and filename where the image file should be moved to.
  * 
  * @return a boolean value. If the image file is successfully moved to the specified directory, the
  * function will return true. Otherwise, it will return false.
  */
  public function moveImage($imgtmp, $dirfile,)
  {
    if (move_uploaded_file($imgtmp, $dirfile)) {
      return true;
    } else {
      return false;
    }
  }



 /**
  * The function `updateImage` updates the profile image and bio text of a user in a database.
  * 
  * @param dp The parameter  represents the profile image of the user. It is the image that the user
  * wants to update or set as their profile picture.
  * @param biotext The parameter "biotext" is a string that represents the user's biography or
  * description. It is used to update the "Bio" column in the "anonyusers" table.
  * @param sessionid The sessionid parameter is the unique identifier for the user's session. It is
  * used to identify the user whose profile image and bio are being updated.
  * 
  * @return an array with the following keys and values:
  * - 'id' => 
  * - 'bio' => 
  * - 'image' => 
  */
  public function updateImage($dp, $biotext, $sessionid)
  {

    try {

      $dpsql = "UPDATE intellichat_users SET profileimage=:image,  Bio=:description WHERE id=:userid";

      $stmt = $this->db->prepare($dpsql);
      $stmt->bindParam(":userid", $sessionid);
      $stmt->bindParam(":description", $biotext);
      $stmt->bindParam(":image", $dp);

      if ($stmt->execute()) {
        //return the users data and email will be the unique key                  
        return [
          'id' => $sessionid,
          'bio' => $biotext,
          'image' => $dp
        ];
      } else {
        //   echo "error while inserting";
        return false;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }



}


?>