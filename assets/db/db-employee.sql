-- MySQL Script
-- Employee Management System
-- 3SIMD

-- CREATE DATABASE dbemployee;
-- This will be removed later
CREATE TABLE Department
(
    department_id int NOT NULL,
    department_name varchar(100) NOT NULL,
    department_location varchar(100) NOT NULL,
    PRIMARY KEY(department_id)
);
CREATE TABLE Division
(
    division_id int NOT NULL,
    division_name varchar(100) NOT NULL,
    department_id int NOT NULL,
    PRIMARY KEY(division_id),
    FOREIGN KEY(department_id) REFERENCES Department(department_id)
);
CREATE TABLE Employee
(
    employee_id int NOT NULL,
    employee_name varchar(100) NOT NULL,
    employee_email varchar(255),
    employee_phone_no varchar(20),
    sex varchar(1) NOT NULL,
    date_of_birth date NOT NULL,
    division_id int NOT NULL,
    employee_photo varchar(255),
    PRIMARY KEY(employee_id),
    FOREIGN KEY(division_id) REFERENCES Division(division_id)
);

CREATE TABLE Project
(
    project_id int NOT NULL,
    project_title text NOT NULL,
    project_desc text NOT NULL,
    pic_id int,
    division_id int,
    PRIMARY KEY(project_id),
    FOREIGN KEY(pic_id) REFERENCES Employee(employee_id),
    FOREIGN KEY(division_id) REFERENCES Division(division_id)
);



CREATE TABLE Shift
(
    employee_id int NOT NULL,
    project_id int NOT NULL,
    admission_time datetime,
    time_out datetime,
	employee_report text,
    FOREIGN KEY(employee_id) REFERENCES Employee(employee_id),
    FOREIGN KEY(project_id) REFERENCES Project(project_id)
);
CREATE TABLE Admin
(
    id int AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    PRIMARY KEY(id)
);
CREATE TABLE user_employee
(
    username int,
    password varchar(255),
	PRIMARY KEY(username)
);
INSERT INTO Admin VALUES (NULL, 'admin', '123');

INSERT INTO Department VALUES (2001, 'IT', 'Earth'),
(2002, 'Finance', 'Indonesia'),
(2003, 'Marketing','London');

INSERT INTO Division VALUES (3001, 'Software Development', 2001),
(3002, 'System Analyst', 2001),
(3003, 'Accounting', 2002),
(3004, 'Advertisement', 2003);

INSERT INTO Employee VALUES (4001, 'Marvin Christian', 'marvin@gmail.com', '0819000000', 'M', '2000-12-25', 3001, NULL),
(4002, 'Andre Jonathan Harahap', 'andre@gmail.com', '0819000000', 'M', '2000-12-25', 3001, NULL),
(4003, 'Bryan Tandian', 'bryan@gmail.com', '0819000000', 'M', '2000-12-25', 3001, NULL),
(4004, 'Pangestu', 'pangestu@gmail.com', '0819000000', 'M', '2000-12-25', 3001, NULL),
(4005, 'Someone', 'someone@gmail.com', '0819000000', 'M', '2000-12-25', 3002, NULL);

INSERT INTO Project VALUES
(1001, 'App 01', 'It is an app', 4002, 3001),
(1002, 'Financial Statements', 'This is the financial statement of magentacorp', 4005, 3003),
(1003, 'App 02', 'It is another app', 4001, 3001),
(1004, 'App Advertisement', 'It is an app ad', 4002, 3004);

INSERT INTO user_employee VALUES(4001, '123'),
(4002, '123'),
(4003, '123'),
(4004, '123'),
(4005, '123');
