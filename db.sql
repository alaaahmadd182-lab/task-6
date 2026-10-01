CREATE DATABASE login_system;
USE login_system;
CREATE TABLE users(
    id int primary key AUTO_INCREMENT,
    first_name varchar(100) NOT NULL,
    last_name varchar(100) NOT NULL,
    username varchar(100) UNIQUE NOT NULL,
    email varchar(250) UNIQUE NOT NULL,
    password varchar(255) NOT NULL,
    age int NOT NULL,
    address varchar(250)
);