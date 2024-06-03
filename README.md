Patient's Information Management System accross different hospital.(ONLY API)
----------------------------------------------------------------------------

Short Description:
-----------------
If a patient, test his or her medical checkup in a city.Then a month later he/she moved to
another city and forgot to take the report with him then he needs to checkup again,which causes money
and time both.But in this system there are a central software system designed which will show the information about that patient accross all the hospital.So it's easy way to track the medical records
for both the doctors and patients.

---------------------------
In this project, I used 3 relational database for 3 different hospital's and 1 non-relational
database for another hospital.So in total 4 hospital database using laravel-11
---------------------------

What is required in your system to show the output:
---------------------------------------------------
1.Mysql(run the appache and mysql when serve the project) 

2.sqlite

3.Mariadb

4.Mongodb

------------------------------------------------------------------
How to use this project:
1. clone the project from github in a fresh folder into your local machine
2. run: cd PatientsRecords
3. run: composer update
4. create .env file in the project folder then copy and paste everything from .env.example file to .env file OR simply just rename the .env.example to .env
5. run: php artisan key:generate
6. run: php artisan migrate
7. seed some data in your database mannualy.

You are ready to go...........


 
