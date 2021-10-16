-- MySQL Script
-- Employee Management System
-- 3SIMD

-- CREATE DATABASE dbemployee;

CREATE TABLE Project (
    project_id int NOT NULL AUTO_INCREMENT,
    project_title text NOT NULL,
    project_desc text NOT NULL,
    PRIMARY KEY(project_id)
);

CREATE TABLE Department (
    department_id int NOT NULL AUTO_INCREMENT,
    department_name varchar(100) NOT NULL,
    department_loaction varchar(100) NOT NULL,
    PRIMARY KEY(department_id)
);

CREATE TABLE Division (
    division_id int NOT NULL AUTO_INCREMENT,
    division_name varchar(100) NOT NULL,
    project_id int NOT NULL, -- FOREIGN KEY REFERENCES Project(project_id)
    department_id int NOT NULL, -- FOREIGN KEY REFERENCES Department(department_id)
    PRIMARY KEY(division_id),
    FOREIGN KEY(project_id) REFERENCES Project(project_id),
    FOREIGN KEY(department_id) REFERENCES Department(department_id)
);

CREATE TABLE Employee (
    employee_id int NOT NULL AUTO_INCREMENT,
    employee_name varchar(100) NOT NULL,
    sex varchar(1) NOT NULL,
    date_of_birth date NOT NULL,
    division_id int NOT NULL, -- FOREIGN KEY REFERENCES Division(division_id)
    employee_photo MEDIUMBLOB NOT NULL,
    PRIMARY KEY(employee_id),
    FOREIGN KEY(division_id) REFERENCES Division(division_id)
);

CREATE TABLE Shift (
    employee_id int NOT NULL AUTO_INCREMENT,
    admission_time datetime,
    time_out datetime,
    FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
);

CREATE TABLE Admin (
    id int AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO Admin VALUES (NULL, 'admin', '123');
