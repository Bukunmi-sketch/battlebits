<?php 
session_start();
require '../Includes/db.inc.php';

include '../Models/Auth.php';      
   
$authInstance= new Auth($conn);

$sessionid=$_SESSION['id'];

$searchtext='';
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
        $searchtext =$authInstance->validate($_POST['searchtext']);

        $out="";
        if(empty($searchtext)){
            $out.="<div style='font-size:0.6em; text-align:center;'> search for playername </div>";
             //  echo $out;
        }else{
          //    $searchquery="SELECT * FROM mafia_users WHERE CONCAT(playername,'',email ) OR CONCAT(playername,' ',email) LIKE CONCAT ('%',:searchtext,'%') ";
             $searchquery="SELECT * FROM  mafia_users WHERE playername LIKE :searchtext";
             $stmt=$conn->prepare($searchquery);
             $searchtext="%".$searchtext."%";
            $stmt->bindParam(':searchtext', $searchtext);
            $stmt->execute();
            if($stmt->rowCount() > 0){
            $returned_result =$stmt->fetchAll(PDO::FETCH_ASSOC);
           

            foreach($returned_result as $result){

                $out.=' <ul>
                <li style="height:50px;background:black;"> <span style="color:white;">'.$result["playername"].'</span>';
                $out.='          
                <img src="images/Rectangle 241(1).png" />
                </li>
                </ul>
                  ';              
                }
                
                echo $out;                                
           }else{
            echo "<div style='font-size:0.6em; text-align:center;'>no result found </div>";
           }
        }     
    
    
    
    
    
    
    
    
    
    


}
           




?>