<?php
namespace Models;

class CardModel{
  private int     $id;
  private String  $card_front;
  private String  $card_back;
  private int     $level;
  private String  $date;
  private String  $deck_id;
  //private MySQLi  $conn;

  public function __construct() {
    $servername = "172.19.0.2";
    $username = "root";
    $password = "secret";
    $dbname = "flashcard_site";

    try {   
      $conn = new \mysqli($servername, $username, $password, $dbname);
    } catch (\Throwable $th) {
      echo $th;
    }
    // Check connection
    if (!$conn) {
      die("Connection failed: " . $conn->connect_error);
    }
  }
}  
?>  <!--
  //}
//   /*
//   *$fronts and $backs represent arrays of the cards. 
//   *   Each complete card will e based off the matching indexes
//   *   The easiest way to pass the variables so far from the HTML form is with two arrays, however
//   *     this could be changed to an associative array, with the key bening the fornt of the card and value representing the back
//   */
//   public function create_deck($fronts, $backs, $deck_id){
//     //Do a similar thing as create_flashard, but aggregate the queries into one query
//   }
//   // public function create_flashcard(
//   //   $card_front,
//   //   $card_back,
//   //   $date,
//   //   $deck_id,
//   // ){
//   //   $this.card_front = $card_front;
//   //   $this.card_back = $card_back;
//   //   $this.level = 1;
//   //   $this.date = $date;
//   //   $this.deck_id = $deck_id;
//   // }
// //   public function read_flashcard(){
    
// //   }
// //   public function update_flashcard(){
    
// //   }
// //   public function delete_flashcard(){
    
  //  }


//?> -->