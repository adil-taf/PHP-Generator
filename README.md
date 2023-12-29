# PHP-generator
In certain situations where you need to iterate over a large dataset while encountering restrictions in utilizing pagination, filters, or narrow selection which leads to memory issues, generators emerge as a practical and efficient alternative approach.

This is a simple application that retrieves data from a database, and iterates over it using generator

To test the application:

1. Clone the project
   - Navigate to your desired location and clone the project repository using the command:
```shell
git clone https://github.com/adil-taf/PHP-generator.git
```
2. Build and start the application containers
   - Navigate to the project's docker directory:
```shell
cd docker/
```
  - Build the application and database containers using the command:
```shell
docker-compose up --build
```
3. Access the MySQL container
   - Establish a shell session in the MySQL container using the command:
```shell
docker exec -it adil-generator-db bash
```
4. Connect to the MySQL database
   - Enter the MySQL root user and provide the password `root` when prompted:
```
mysql -u root -p
```
5. Create the database
   - Create the database named `my_db`:
```SQL
CREATE DATABASE my_db;
```
6. Create the database table
   - Use the 'my_db' database and create the table named `tickets`:
```SQL
USE my_db;
CREATE TABLE tickets (
    id int UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    content longtext,
    user_id int UNSIGNED,
    created_at datetime NOT NULL,
    updated_at datetime DEFAULT NULL
);
```
7. Insert test data
   - Insert a sample row into the `tickets` table:
```SQL
INSERT INTO tickets (title, content, user_id, created_at)
VALUES ('Test Title', 'Test Content', 1, NOW());
```
8. Verify the application
    - Open a web browser and navigate to http://localhost:8002. You should see the inserted test data.
