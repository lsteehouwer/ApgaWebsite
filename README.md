# Applied Games Leaderboard Website
Website detailing the challenges for the Applied Games course (`INFOB3APGA`) at Utrecht University. Built for year 2017/2018.

The challenges are listed with a leaderboard, showing the the scores of the students.

## Installation
This website is built on the CodeIgniter framework. For CodeIgniter related documentation, see [https://www.codeigniter.com/user_guide/](here).
CodeIgniter is a PHP framework. PHP support is therefore is prerequisite for your server.

The website can be placed on the server almost directy. You should have the following file tree:
```
├── application
│   ├── cache
│   ├── config
│   ├── controllers
│   ├── core
│   ├── database
│   ├── helpers
│   ├── hooks
│   ├── index.html
│   ├── language
│   ├── libraries
│   ├── logs
│   ├── models
│   ├── third_party
│   └── views
├── codeigniter
│   ├── core
│   ├── database
│   ├── fonts
│   ├── helpers
│   ├── index.html
│   ├── language
│   └── libraries
├── composer.json
├── public
│   ├── index.php
│   └── static
└── README.md
```

The only file you really need to tinker with to make the website work is located at `application/config/config.php`.
Declare in the config file what the `base_url` of the website should be. This URL should correspond to the front page of the website. This URL _is required_ to end with _public_. This is a design decision that was made to not expose other parts of the site. By using `.htaccess` files users are prevented from reaching these other parts.

An example `base_url` would be `$config["base_url"] = "https://www.applied_games.com/public"`;

The standard provided database is an SQLite3 database. In order to work with this database your server's PHP installation needs to have its SQLite driver enabled. You can activate this driver in the `php.ini` file. For further details, see [https://wiki.archlinux.org/index.php/PHP#Sqlite](here).

The standard configuration for the database should work 'out of the box', but in case there are problems, check the configuration for the database at `application/config/database.php`.

## News 
In order to keep the students up to date with the latest developments regarding their grades, the main page has a little news section. These news items are to be added manually, by editing the source for the main page. The main page's source code can be found here: ` application/views/hoofdranking.php`. Make use of CodeIgniter's `site_url()` method to generate links to other pages of the website. For documentation regarding this function, see: [https://www.codeigniter.com/user_guide/helpers/url_helper?highlight=site_url#site_url](here).

## Technical Details
The standard provided database is an SQLite3 database, but this can easily be substituted. See [https://www.codeigniter.com/user_guide/database/configuration.html](here).

Only 3 tables are used for this website: `student`, `challenge`, and `submission`.

+ `student`(**`number`**, `name`, `username`) contains the records for all students. Each student number is unique and therefore used as the primary key. Usernames should also be unique to avoid confusion on the leaderboard.
+ `challenge`(**`id`**, `week`, `letter`, `description`) contains the descriptions for all challenges. Each challenge is posted in a certain week and has a letter assigned to it to differentiate it from the other challenges in the same week. The `description` contains the specifics for the challenge. This description is to be formatted in HTML.
+ `submission`(**`student`**, **`challenge`**, `score`) contains the submissions of the students. Every submission gets a score assigned to it when it is graded.

## Tests
This website has been tested and was found to be working for the following browsers:
* Firefox (55.0.3 - 64-bit)
* Chromium (60.0.3112.113 - 64-bit)
* Lynx (2.8.8rel.2)

## TODO
+ Implement an admin interface where grades can be adjusted on the site itself. Currently all changes to the scores need to be done by downloading the database from the server, making changes manually, and then reuploading the database. This is incredibly cumbersome.
+ Implement a way of editing challenge descriptions on the website itself (low priority).
