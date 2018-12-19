# Applied Games Website
Website detailing the challenges for the Applied Games course (B3APGA) at Utrecht University.

The challenges are listed with a leaderboard, showing the the scores of the students.
## Technical Details
This website is built on the [https://www.codeigniter.com/](CodeIgniter framework).

The standard provided database is an SQLite database, but this can easily be substituted. See [https://www.codeigniter.com/user_guide/database/configuration.html](here).

Only 3 tables are used for this website: `student`, `challenge`, and `submission`.

+ `student`(**`number`**, `name`, `username`) contains the records for all students. Each student number is unique and therefore used as the primary key. Usernames should also be unique to avoid confusion on the leaderboard.
+ `challenge`(**`id`**, `week`, `letter`, `description`) contains the descriptions for all challenges. Each challenge is posted in a certain week and has a letter assigned to it to differentiate it from the other challenges in the same week. The `description` contains the specifics for the challenge. This description is to be formatted in HTML.
+ `submission`(**`student`**, **`challenge`**, `score`) contains the submissions of the students. Every submission gets a score assigned to it when it is graded.

## TODO
+ Implement an admin interface where grades can be adjusted on the site itself. Currently all changes to the scores need to be done by downloading the database from the server, making changes manually, and then reuploading the database. This is incredibly cumbersome.
+ Implement a way of editing challenge descriptions on the website itself (low priority).
