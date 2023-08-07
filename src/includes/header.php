<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../dashboard/stylesheets/base.css">
        <?php echo $load; ?>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <nav>
            <ul>
                <li> <a href='/index.php' alt='Home Page'>Home Page</a>                
                <li> <a href='/Views/create-flashcard.php' alt='Create Flashcards'>Create Flashcards</a>
                <li> <a href='/Views/study-flashcard.php' alt='Study Flashcards'>Study Flashcards</a>
            </ul>
        </nav>
        <?php echo $content; ?>
    </body>
</html>	