<?php

//namespace Users;

//require '../Includes/db.inc.php';

class Shop
{
  private $db;

  public function __construct($conn)
  {
    $this->db = $conn;
  }

  //create new Transaction
  public function buyWeapon($buyer_id, $amount_paid, $weapons, $bought_date)
  {
    try {
        foreach ($weapons as $weapon) {
      $sql = "INSERT INTO mafia_shops( buyer_id, amount, type,  date ) VALUES ( :buyer_id, :amount_paid, :weapon, :bought_date )";
      $stmt = $this->db->prepare($sql);
      $result =  $stmt->execute([
        ":buyer_id" => $buyer_id,
        ":amount_paid" => $amount_paid,
        ":weapon" => $weapon,
        ":bought_date" => $bought_date
      ]);
      }
      if ($result) {
        return true;
      } else {
        //   echo "error buying this item";
        return false;
      }
    } catch (PDOException $e) {
      echo  $e->getMessage();
    }
  }   //create()

  public function totalDeposit($depositorid){
    $query="SELECT SUM(deposit_amount) AS amount FROM mafia_transactions WHERE depositor_id=:depositorid ";
    $statement=$this->db->prepare($query);
    $statement->bindParam(':depositorid',$depositorid );
    $statement->execute();
    return $statement;
  }


  public function getLastTransactionHistory($depositorid)
  {
    $sql = "SELECT * FROM mafia_transactions WHERE depositor_id=:depositorid  ORDER BY id ASC  LIMIT 5";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':depositorid',$depositorid );
    $stmt->execute();
    return $stmt;
  }

  public function getUserCreatedChatbot($creatorid)
  {
    $sql = "SELECT * FROM mafia_transactions WHERE creator_id = :creatorid ";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":creatorid", $creatorid);
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




}
