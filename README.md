Ed & Val 60th
=========

### Technologies Used
- Grunt 
- SCSS
- PHP & MySQL
- jQuery/JavaScript

----
####Grunt
Grunt is a JavaScript task runner for this project. It compiles the CSS (from SCSS), concatenates and minifies the JavaScript and other maintenance tasks.

There is also a Grunt task that handles uploading all the files to the server. Another module added is browserSync which allows you to view changes in real time. No more refreshing :)

----
####PHP & MySQL
The majority of this site is build on these two languanges. In order for users to post comments and photos they must be registered. The information requested in the form is then stored. Only registered/logged in users may post. 

The pagination for each section is dynamically created by PHP, according to the information in the database.

All image thumbnails are generated via PHP and link to the original image uploaded, which is stored on the database as well.

-----
####jQuery/JavaScript
There was not too much jQuery/JavaScript associated with this project. When scrolling there is a parallax like effect happening in the header.

There was only one plugin added to this project which was an Ajax File Uploader which could handle uploading multiple files. You can find more details about it here: http://hayageek.com/