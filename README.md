# RealState APP

This Laravel-based application, designed for evaluation purposes, features an admin panel, full authentication and property management APIs, and location management. It uses SQLite for its database and can be run with a single Docker command. Note: It is not intended for production use.

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

Note: Ensure authentication is completed and the token is used for data manipulation APIs.
