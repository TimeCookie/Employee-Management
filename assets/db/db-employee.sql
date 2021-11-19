-- MySQL Script
-- Employee Management System
-- 3SIMD

-- CREATE DATABASE dbemployee;
-- This will be removed later

CREATE TABLE Project (
    project_id int NOT NULL,
    project_title text NOT NULL,
    project_desc text NOT NULL,
    PRIMARY KEY(project_id)
);

CREATE TABLE Department (
    department_id int NOT NULL,
    department_name varchar(100) NOT NULL,
    department_location varchar(100) NOT NULL,
    PRIMARY KEY(department_id)
);

CREATE TABLE Division (
    division_id int NOT NULL,
    division_name varchar(100) NOT NULL,
    project_id int NOT NULL, -- FOREIGN KEY REFERENCES Project(project_id)
    department_id int NOT NULL, -- FOREIGN KEY REFERENCES Department(department_id)
    PRIMARY KEY(division_id),
    FOREIGN KEY(project_id) REFERENCES Project(project_id),
    FOREIGN KEY(department_id) REFERENCES Department(department_id)
);

CREATE TABLE Employee (
    employee_id int NOT NULL,
    employee_name varchar(100) NOT NULL,
    sex varchar(1) NOT NULL,
    date_of_birth date NOT NULL,
    division_id int NOT NULL,
    employee_photo varchar(255),
    PRIMARY KEY(employee_id),
    FOREIGN KEY(division_id) REFERENCES Division(division_id)
);

CREATE TABLE Shift (
    employee_id int NOT NULL,
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
CREATE TABLE user (
    employee_id int,
    password varchar(255),
    FOREIGN KEY(employee_id) REFERENCES Employee(employee_id);
);

INSERT INTO Admin VALUES (NULL, 'admin', '123');

INSERT INTO Project VALUES (1001,'App 01', 'It is an app');

INSERT INTO Department VALUES (2001,'IT','Earth');

INSERT INTO Division VALUES (3001,'Software Development', 1001, 2001);
INSERT INTO Division VALUES (3002,'System Analyst',1001,2001);

INSERT INTO Employee VALUES (4001,'Marvin Christian','M','2000-12-25',3001,NULL);
INSERT INTO Employee VALUES (4002,'Andre Jonathan Harahap','M','2000-12-25',3001,NULL);
INSERT INTO Employee VALUES (4003,'Brian Tandian','M','2000-12-25',3001,NULL);
INSERT INTO Employee VALUES (4004,'Pangestu','M','2000-12-25',3001,NULL);
INSERT INTO Employee VALUES (4005,'Someone','M','2000-12-25',3002,NULL);
