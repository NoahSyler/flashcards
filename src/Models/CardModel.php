<?php
namespace Models;

class CardModel{
  private int     $id;
  private array   $card_front;
  private array   $card_back;
  private int     $level;
  private String  $date;
  private String  $deck_id;
  private \mysqli  $conn;

  public function __construct() {
    $servername = "172.19.0.2";
    $username = "root";
    $password = "secret";
    $dbname = "flashcard_site";

    try {   
      $this->conn = new \mysqli($servername, $username, $password, $dbname);
    } catch (\Throwable $th) {
      echo $th;
    }
    // Check connection
    if (!$this->conn) {
      die("Connection failed: " . $conn->connect_error);
    }
  }

  public function select_deck($deck_id){
    $this->deck_id = $deck_id;
    $query = "SELECT card_front, card_back, card_level, deck_id FROM flashcards WHERE (deck_id=$deck_id AND due_date<=NOW());";
    $result = $this->conn->query($query);
    if($result){
      // https://stackoverflow.com/questions/16525413/fatal-error-cannot-use-object-of-type-mysqli-result
      while ($row = $result->fetch_assoc()){
        if(is_array($row)){
          $other_result[] = $row;
        }
      }
    }
    else{
      $other_result[] = ["this","aint", "right"];
    }
    // echo gettype($result);
    // echo '<br>';
    // if(!$result){
    //   // echo $result;
    //   // echo '<br>';
    //   // echo "result echoed";
    // }
    // else{
    // echo '<br>';
    // while ($row = $result->fetch_row()){
    //   // echo '<br>';
    //   if(is_array($row)){
    //     // echo var_dump($row);
    //     // echo '<br>';
    //     $diff[] = $row;
    //   }
    //   else{echo($row);}}
    //   // echo '<br>';
    //   $diff[] = 'wut';
    // }
    return $other_result;
  }

  public function get_decks(){
    $query = "SELECT DISTINCT deck_id FROM flashcards;";
    $result = $this->conn->query($query);
    while ($row = $result->fetch_row()){
      $deckIds[] = $row[0];
    }

    return $deckIds;
  }
  
  public function create_flashcard(
    // $date,
    // $deck_id,
    $deck
  ){
    // $this.card_front = $card_front;
    // $this.card_back = $card_back;
    // $this.level = 1;
    // $this.date = $date;
    // $this.deck_id = $deck_id;
    $this->card_front = $deck[0][0];
    $this->card_back = $deck[0][1];
    $this->date       = date('Y-m-d H:i:s');
    echo '<h1>'.var_dump($deck[0][0]).'</h1>';
    echo '<h1>'.var_dump($deck[0][1]).'</h1>';
    //echo gettype($this->card_front);

    $query = "SELECT MAX(deck_id) FROM flashcards;";
    $this->deck = $this->conn->query($query)->fetch_row()[0];
    $this->deck++;

    echo $this->deck;
    for($i=0; $i<count($this->card_front); $i++){
      $query = "INSERT INTO flashcards (card_front, card_back, card_level, due_date, deck_id) VALUES ('".$this->card_front[$i]."', '".$this->card_back[$i]."', 1, '$this->date', $this->deck)";
      if($this->conn->query($query)){
        echo 'SUCCESS!!!!!!!!!!!!';
      }
      else{
        echo 'FAILURE!!!!!!';
      }
    }
    // get the max of the deck, and add one
    // date will be the date time of now
    
  }
  public function read_flashcard(){
    
  }
  public function update_flashcard(){
    
  }
  public function delete_flashcard(){
    
   }


}  


//   /*
//   *$fronts and $backs represent arrays of the cards. 
//   *   Each complete card will e based off the matching indexes
//   *   The easiest way to pass the variables so far from the HTML form is with two arrays, however
//   *     this could be changed to an associative array, with the key bening the fornt of the card and value representing the back
//   */

?> 