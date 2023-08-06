<?php

$title = 'Spaced Learning';
/*
*Nowdoc string: https://www.php.net/manual/en/language.types.string.php#language.types.string.syntax.nowdoc
*
*php include: https://www.php.net/manual/en/function.include.php
*/
$content = <<<'EOD'
<h1 class='center'>Spaced Learning</h1>
<hr>
<div class='center-cards'>
<p class="flashcard">Spaced learning is an excellent tool for commiting information to memory. 
    If someone has, let's say a month, to study for a certification, 
    then using spaced learning may be the fastest way to commit the information to memory.</p>
<p class="flashcard">As people go without recalling information, they begin to forget. 
    Practicing active recall as the memory begins to fade can solidify the information in one's longterm memory. 
    See this <a href="https://www.ncbi.nlm.nih.gov/pmc/articles/PMC8759977/" aria-label="National Library of Medicine article" a> article for more information.</a></p> 
<div>    
EOD;


/*
*include was not working earlier. After reading the stack overflow article below,
*I implemented the $_SERVER['DOCUMENT_ROOT'] in my path.
*
*I also started using require instead, sense this is an important element.
*
*https://stackoverflow.com/questions/5762017/php-include-not-working-function-not-being-included
*/
require($_SERVER['DOCUMENT_ROOT'].'/includes/header.php');
?> 