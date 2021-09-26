
# Biznesskit point of sale (POS) 
 - This is a Point of Sale system backend API
 - Developed By Antony  
 - This repo is a fork of the original repo which is a private repo

# Installation
- Clone the repo into your local system
-  run 'composer install' command to install the dependancies
- run 'php artisan serve' to serve the applicatiion
- you can make API requests to the endpoints defined in the api.php file using POSTMAN
- All end points return a json data object.

# Usage
- To begin withn your can send a post request to 'users.store' route with parameters of your full_name, email and password
- you will get a response back with either a success or failure message.

- The project also includes an unfinished dashboard made with Vuejs and Admin LTE that can be accessed through the browser

# Security
- All end points secured with Laravel Passport

# database
mySQL
