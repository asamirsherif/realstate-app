# RealState APP

The project is a Laravel-based application, Serves as an evaluation task.

it runs using sqlite as database, can run with a single docker command

not intended for production use

# INSTALL & RUN

clone the repo then run the command from the root folder:

`docker build -t realstate-app . && docker run -p 8080:80 realstate-app`

## Admin Panel

````
   http://localhost:8080/admin
   
    email: admin@admin.com
    password: password
````

## API Collection ( Postman )

````
   https://documenter.getpostman.com/view/25680564/2sA3kSoP7a
````

NOTE: Make sure to authenticate and use the token in the data manipulation APIs
