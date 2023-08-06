<?php 
require '../Models/CardModel.php';

use Models\CardModel;

$load = '<script src="../dashboard/javascripts/study.js" defer></script>';

$title = 'Study';
$content = <<<EOD
<button id="open-frame" alt="Open a new frame to study flashcards">Begin Study</button>
EOD;

$card_model = new CardModel();

require('../includes/header.php');
?>