# QUESTIONNAIRE

# Instructions in how to use the application

- Database Conection (used in my case, it can the changed in .env):
  
  DB_CONNECTION=mysql
  
  DB_HOST=127.0.0.1
  
  DB_PORT=8889
  
  DB_DATABASE=laravelbasico
  
  DB_USERNAME=root
  
  DB_PASSWORD=root
 
- All the tables was created using migrations, you can see them in database/migrations. Having the database created, you can run the migrations using the comand: "php artisan migrate".

- Two funcionalities were developed. One of them, you have to login to have the access (to create the questions). To have a login you must register yourself.

- There is a field called "Param", this field must be used separating the parameters by |. For example: car|bike|truck

