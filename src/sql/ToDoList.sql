DROP DATABASE IF EXISTS ToDoList;
CREATE DATABASE ToDoList;
USE ToDoList;

DROP USER IF EXISTS 'php'@'localhost';
CREATE USER 'php'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON ToDoList.* to 'php'@'localhost';

DROP TABLE IF EXISTS User;
CREATE TABLE User(
    uname varchar(15) not null,
    pwd varchar(250) not null,

    primary key(uname)
);

DROP TABLE IF EXISTS Task;
CREATE TABLE Task(
    task varchar(100) not null,
    completed boolean default false,
    uname varchar(15) not null,

    primary key (task),
    foreign key (uname) references User(uname)
);