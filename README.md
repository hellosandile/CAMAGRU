# Camagru
Camagru is a small, Instagram-like website that allows users to take and share photo edits, written primarily in PHP.
This project was an introduction to the fundamentals of web development, PHP, and other basic web development technologies.

## Requirements
- PHP
- XAMPP
- JavaScript

## Installation and Setup
NOTE: This is for setting the project to run on Arch Linux Manjaro using Xampp. Follow your OS specific instructions for other platforms.
- Install Xampp:
- Set up a database user and initialize the database:
- Clone the project into the /opt/lampp/htdocs directory
- Start the Xampp servers via the included GUI.
- Initialize the Database tables by calling the setup script [Database Setup](https://localhost/camagru/config/setup.php)
- Navigate to [PHP Myadmin](https://localhost/phpmyadmin/) to verify that the database has been populated.
- After running the setup you will be redirected to [Camagru Home](https://localhost/camagru/)

## Tools & Technologies
#### Back-end:
- Apache:  An open source web server and the most widely used server worldwide for delivery of web content. Used to  serves the project on localhost for development.
- PHP: A general-purpose language suited for web development (requirement of the project).
#### Front-end:
- HTML: The standard markup language used to develop web Pages. It only defines the layout of the page contents. 
- CSS: Used to define the style of the website. It augments HTML and can be used to create semi-dynamic websites.
- JavaScript: A programming language that is often used alongside HTML and CSS to make dynamic websites. It is usually referred to as the language of the web because of its strong compatibility with web browsers and HTML.
#### Data Management System (DBMS):
- MariaDB: An open source SQL server used as the primary database driver along with the Structured Query Language we used for the project database queries.


## WTC_ suggested project testing check list
[Marking sheet linked here](https://github.com/tcajee/camagru/blob/master/camagru.pdf)
- The following are test will be run:
    - Preliminary checks:
        - Usage of PHP for the back-end
        - No external frameworks
        - Config/database.php exists
        - Config/setup.php exists
        - PDO is configured
    - Start the web server.
    - Register and account
    - Login
    - Webcam
    - Public Gallery
    - Settings modification
    - Delete user's own post
    - Password stored securely in Database?
    - Try inject script.
    - Try inject SQL
    - Was AJAX present?
    
- The following are the expected outcomes:
    - Preliminary
        - The back-end of the source code is written in PHP.
        - There are no frameworks used in the source code.
        - You will notice the file config/database.php in the source code.
        - You will notice the file config/setup.php in the source code.
        - You will notice we setup our PDO in the file config/database.php
    - If you start the apache servers from XAMPP and navigate to localhost/(port)camagru you will see the landing page for Camagru.
    - You can navigate to the signup page, enter your credentials and register an account.
    - You should be able to login using the credentials you created.
    - You should be able to navigate to the webcam page and use the webcam after allowing Camagru access to your internal webcam.
    - You should be able to access the public gallery where you can view, like and comment on other users' posts.
    - You should be able to modify your settings and details on the setting page.
    - You should be able to delete your own posts.
    - The Password should be hashed before being stored in the DB.
    - No 'Alert' should show up.
    - No DB information should be displayed.
    - You can see the use of Ajax in the source code.
