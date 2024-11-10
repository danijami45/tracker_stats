Visitor Tracker JavaScript:
The tracker JavaScript code can be found in "/assets/js/visitor_tracker.js".
You can copy and paste the code in your Javascript or simply load the js file.
It requires JQuery and I have used jQuery v3.7.1 in this project.
The script lets you save 1 visit.
It has 1 hour limit for testing. 
Note: 2 visitor websites added with running javascript in folder "tracker_stats/visitors_websites" named "visitor_website_1" and "visitor_website_2". 
      Simply put them in htdocs and hit request by url "http://localhost/visitor_website_1/visitors" and "http://localhost/visitor_website_2/visitors"
      Open console for message or network tab in inspect element.

Database Queries:
Database Schema can be found in root directory "tracker_stats/database_schema.sql"
Run the Database and Table queries.

PHP Code:
Tracker Stats code is written with Codeigniter 3.1.13.
Min PHP version 5.6. I have used PHP 7.1.33 for development and testing.

How to setup:
Put the project folder "tracker_stats" in htdoc.
Configure database in "tracker_stats/application/config/database.php".
Once ready, access stats controller by "http://localhost/tracker_stats/stats".
Initially this should show an empty table.
Take the visitor script from "/assets/js/visitor_tracker.js" and put it in your visitor project and run.
After running there should be one record in here "http://localhost/tracker_stats/stats".
