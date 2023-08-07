<?php 
require '../Models/CardModel.php';
use Models\CardModel;
$card_model = new CardModel();
$decks = $card_model->get_decks();
$selected_deck = null;

$load = '<script src="../dashboard/javascripts/study.js" defer></script>';

$title = 'Study';
$content = <<<EOD
<button id="open-frame" alt="Open a new frame to study flashcards">Begin Study</button>
EOD;

$content.=<<<EOD
<br>
<label for='deck-selection'>Select Deck</label>
<form id='deck-selection' action="study-flashcard.php" method="post">
<select name="deck" id="deck">
<option value="">---</option>
EOD;

foreach($decks as $deck){
    $content.=<<<EOD
    <option value="$deck">$deck</option>
    EOD;
}

$content.="</select></form>";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(array_key_exists('deck', $_POST)){
        $selected_deck = $card_model->select_deck($_POST['deck']);
    }
}
if($selected_deck){
    $content.="<script>let deck=".json_encode($selected_deck)."</script>";
}
else{
    $content.="<script>let deck=null</script>";
}

require('../includes/header.php');
?>