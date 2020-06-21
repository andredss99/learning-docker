# Learning Docker

I'm a begginer in Docker, so I created a simple example of how to use it to create an application by following some tutorials. In this case, I created three containers:

- MySQL database, to store all the data;
- NodeJS, where I created my API. It will consult the database and provide the necessary information for the website;
- PHP/Apache to build the backend of my website. It will get all the informations with the NodeJS API and show them on the browser.

## Docker images used (you can see it in the Dockerfiles also):

```
mysql:latest
node:lts-slim
php:7.2-apache
```

## How to use 🤔

1. Clone this repository:
```git clone https://github.com/andredss99/learning-docker.git```

2. MySQL:
    - Build the MySQL image: ```docker build -t mysql-image -f api/db/Dockerfile .```
    - Run the MySQL container: ```docker run -d -v $(pwd)/api/db/data:/var/lib/mysql --rm --name mysql-container mysql-image```
    - Run the SQL script to create the database and insert some test values: ```docker exec -i mysql-container mysql -u root -p < api/db/script.sql```

3. NodeJS:
    - Make sure you have NPM installed on your PC
    - Initialize the project in the ```api``` folder: ```npm init```
    - In the same folder: ```npm install --save-dev nodemon``` and then: ```npm install --save express mysql```
    - Build the NodeJS image: ```docker build -t node-image -f api/Dockerfile .```
    - Run the NodeJS container: ```docker run -d -v $(pwd)/api:/home/node/app -p 9001:9001 --link mysql-container --rm --name node-container node-image```

4. PHP:
    - Build the PHP image: ```docker build -t php-image -f api/website/Dockerfile .```
    - Run the PHP container ```docker run -d -v $(pwd)/api/website:/var/www/html -p 8888:80 --link node-container --rm --name php-container php-image ```

5. Now you should be able to view all the products from the database :)

Credits for the tutorial: Programador a Bordo (https://www.youtube.com/watch?v=Kzcz-EVKBEQ)