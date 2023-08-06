# Flashcards
Flashcards is intended to be a site for using spaced learning. It is currently running on a XAMPP server, which is where the current file system is from. 

There will be a total of 9 "bins." Each will represent the length of time before the next time the card will be studied. Every card starts in bin 1, then as they are recalled correctly, move up a bin.

#### Things that still need to be done:  <hr>
- Clean up the XAMPP files from the default XAMPP configuration
- Connect the MySQL database
    - Create a priveleged user in the database
    - Build the needed tables. The attributes for the table will probably be the following: 
        - card_front
        - card_back
        - bin (The current bin the card is in, should be 1-9)
        - The day the card is due to be reviewed
            - This will be in contrast to saving the date the card was reviewed. It will be easier to calculate the date before saving, and then query the current and past-due cards for the study session.
    - Build the Model class to interact with the database
    - Use an object of the Model class in the views to perform the CRUD cycle on the cards.
- Ensure the documentation in the code is thorough.
- Make the CSS mobile friendly
