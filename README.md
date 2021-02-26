<h1 align="center"> Business Management</h1>


## About Business Management

Business Management is a small backend application built using Laravel with the ability to performn crud functions on businesses using an API.

## Approach 
A RESTFUL API was built using Laravel default RESTful routes. GETs for retrieving information, POSTs for storing information, PUT for editing and DELETE for deleting.

Following the Laravel MVC framework, Eloquent models were using for manipulating the database table. Only one DB table was used for this solution, 'Business'.

The inbuilt laravel database implemented using Laravel Sail holds the database for the project, migrations were used for managing database structure. Combined with the use of Docker, this will make the project easily distributable. 

PHPUnit testing is implemented through the inbuilt laravel test engine.  

