<?php 
require '../Models/CardModel.php';
use Models\CardModel;
$card_model = new CardModel();

$title = 'Flash Cards';

/*
*https://www.php.net/manual/en/function.file-get-contents.php
*/
//$content = file_get_contents('create-flashcard.html');

$deck = array();
$row_count = 1;
$content = '';

/*
*Reserved variables: https://www.php.net/manual/en/reserved.variables.server.php
*
*array_key_exists(): https://www.php.net/manual/en/function.array-key-exists.php
*
*/
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(array_key_exists('card_front', $_POST)){
        $deck[] = [$_POST['card_front'], $_POST['card_back']];

        $card_model->create_flashcard($deck);

    }
    elseif(array_key_exists('add-row', $_POST)){
        $row_count = $_POST['add-row'] + 1;
    }
    elseif(array_key_exists('subtract-row', $_POST)){
        $row_count = $_POST['subtract-row'] - 1;
    }
}

// foreach($Deck as $card => $value){
//     echo "<p>Front:<br>$value[0]</p><p>Back:<br>$value[1]</p>";
// }

/*
*This stack overflow post showed me to add '[]' to the end of the name of a repeated element. Great idea!
*https://webmasters.stackexchange.com/questions/9775/is-it-valid-to-have-multiple-form-input-elements-with-the-same-name
*
*for loops: https://www.php.net/manual/en/control-structures.for.php
*
*Forms:
*    https://developer.mozilla.org/en-US/docs/Web/HTML/Element/form
*
*/
$content .= '<form action="create-flashcard.php" method="post">';

for($i = 1; $i<=$row_count; $i++){
    $content.=<<<EOD
        <label for="card_front">Front:</label>
        <input type='text' name='card_front[]' id = 'card_front' required>
        <label for="card_back">Back:</label>
        <input type='text' name='card_back[]' id = 'card_back' required>
        <br>
    EOD;
}

$content.=<<<EOD
    <input class='submit' type="submit" value="Submit!" >
    </form>
    <form action="create-flashcard.php" method="post">
        <button id="add-row" name="add-row" value="$row_count">Add Row</button>
    </form>
    <form action="create-flashcard.php" method="post">
        <button id="subtract-row" name="subtract-row" value="$row_count">Subtract Row</button>
    </form> 
EOD;

/* 
*count() - https://www.php.net/manual/en/function.count.php
*/
if($_SERVER['REQUEST_METHOD']==='POST' && (array_key_exists('card_front', $_POST))){
    $content.="<table>";

    for($i=0; $i<count($deck[0][0]); $i++){
        $content.="
        <tr>
        <td>".$deck[0][0][$i]."</td>
        <td>".$deck[0][1][$i]."</td>
        </tr>
        ";
    }
    $content.="</table>";
}


require('../includes/header.php');

?>
