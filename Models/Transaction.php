<?php

//namespace Users;

//require '../Includes/db.inc.php';

class Transaction
{
  private $db;

  public function __construct($conn)
  {
    $this->db = $conn;
  }

  //create new Transaction
  public function createTransaction($depositor_id, $depositamount, $type, $deposit_date)
  {
    try {

      $sql = "INSERT INTO mafia_transactions( depositor_id, amount, type, date ) VALUES ( :depositor_id, :amount, :type, :deposit_date )";
      $stmt = $this->db->prepare($sql);
      $result =  $stmt->execute([
        ":depositor_id" => $depositor_id,
        ":amount" => $depositamount,
        ":type" => $type,
        ":deposit_date" => $deposit_date
      ]);

      if ($result) {
        return true;
      } else {
        //   echo "error while creating chatbot";
        return false;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }   //create()

  public function totalDeposit($depositorid){
    $query="SELECT SUM(amount) AS amount FROM mafia_transactions WHERE depositor_id=:depositorid ";
    $statement=$this->db->prepare($query);
    $statement->bindParam(':depositorid',$depositorid );
    $statement->execute();
    return $statement;
  }


  public function getLastTransactionHistory($depositorid)
  {
   $sql="( SELECT * FROM mafia_transactions WHERE depositor_id=:depositorid ORDER BY date DESC LIMIT 5)  UNION
    (
      SELECT * FROM mafia_shops WHERE buyer_id=:depositorid ORDER BY date DESC LIMIT 5
    )
    ORDER BY date DESC";
    
   // $sql = "SELECT * FROM mafia_transactions WHERE depositor_id=:depositorid  ORDER BY id ASC  LIMIT 5";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':depositorid',$depositorid );
    $stmt->execute();
    return $stmt;
  }

 


  public function deleteYourChatbot($chatbotid, $creatorid)
  {
    $sqldelete = 'DELETE FROM mafia_transactions WHERE id =:chatbotid  AND creator_id =:creatorid ';
    $stmt = $this->db->prepare($sqldelete);
    $stmt->bindParam(":chatbotid", $chatbotid);
    $stmt->bindParam(":creatorid", $creatorid);
    $stmt->execute();
    return $stmt;
  }






  public function getchatbotinfo($chatbotname)
  {
    try {
      $sql = "SELECT * FROM mafia_transactions WHERE chatbot_name=:chatbotname";
      $stmt = $this->db->prepare($sql);
      $stmt->bindParam(":chatbotname", $chatbotname);
      $stmt->execute();
      $returned_row = $stmt->fetch(pdo::FETCH_ASSOC);
      return [
        'id' => $returned_row['id'],
        'chatbot_name' =>         $returned_row['chatbot_name'],
        "chatbot_docs" => $returned_row['chatbot_docs'],
        "creation_date" => $returned_row['creation_date'],
        "chatbot_desc" => $returned_row['chatbot_desc'],
        "chatbot_text" => $returned_row['chatbot_text'],
        "success" => "success"
      ];
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  function removeTextOccurrence($inputString) {
    $pattern = '/<p:sld[^>]*>.*?<\/p:sld>/si';
    $replacement = '';

    // Perform the replacement using preg_replace
    $outputString = preg_replace($pattern, $replacement, $inputString);

    return $outputString;
}




  public function getChatbotno($getid)
  {
    //  $getid=85;
    //SELECTING ALL CHATBOTS WHERE WHERE USERID IS SIMILAR
    $sql = "SELECT * FROM mafia_transactions WHERE creator_id=:userid ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":userid", $getid);
    $stmt->execute();
    $chatbotsno = $stmt->rowCount();

    $sqlchatbotno = "UPDATE intellichat_users SET chatbotCount='$chatbotsno' WHERE id=:userid  ";  //
    $stmtupdate = $this->db->prepare($sqlchatbotno);
    $stmtupdate->bindParam(":userid", $getid);
    /*  if( $stmtupdate->execute()){
          echo $chatbotsno;
        }
        */
    $stmtupdate->execute();
    return $chatbotsno;
  }

  public function trainWithText($creatorid, $chatbotid, $chatbot_text)
  {


    $query = "UPDATE mafia_transactions SET chatbot_text=:chatbot_text WHERE id=:chatbotid ";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(":chatbot_text", $chatbot_text);
    $stmt->bindParam(":chatbotid", $chatbotid);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
