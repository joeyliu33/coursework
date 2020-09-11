DROP DATABASE IF EXISTS UNIVERSITY;
CREATE DATABASE IF NOT EXISTS UNIVERSITY;
USE UNIVERSITY;


CREATE TABLE IF NOT EXISTS User (
uid CHAR(8) PRIMARY KEY,
first_name VARCHAR(40) NOT NULL,
last_name VARCHAR(15) NOT NULL,
role VARCHAR(20) NOT NULL,
UNIQUE(first_name,last_name)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS Student(
student_id CHAR(8) PRIMARY KEY,
first_name VARCHAR(40) NOT NULL,
last_name VARCHAR(15) NOT NULL,
DOB date,
sex CHAR(1),
phone integer,
uid CHAR(8),
FOREIGN KEY (uid) REFERENCES User(uid),
UNIQUE(first_name,last_name)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS AcademicStaff (
staff_id CHAR(8) PRIMARY KEY,
first_name VARCHAR(40) NOT NULL,
last_name VARCHAR(15) NOT NULL,
position VARCHAR (25),
uid CHAR(8),
FOREIGN KEY (uid) REFERENCES User(uid),
UNIQUE(first_name,last_name)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS AdminStaff (
admin_id CHAR(8) PRIMARY KEY,
first_name VARCHAR(40) NOT NULL,
last_name VARCHAR(15) NOT NULL,
duty VARCHAR(25),
uid CHAR(8),
FOREIGN KEY (uid) REFERENCES User(uid),
UNIQUE(first_name,last_name)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS Course(
course_id CHAR(7) PRIMARY KEY,
course_name VARCHAR (60),
convenor_id CHAR(8),
FOREIGN KEY (convenor_id) REFERENCES AcademicStaff(staff_id)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS Class(
staff_id CHAR(8),
course_id CHAR(7),
schedule VARCHAR(30),
FOREIGN KEY(staff_id) REFERENCES AcademicStaff(staff_id),
FOREIGN KEY(course_id) REFERENCES Course(course_id),
PRIMARY KEY(staff_id, course_id)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS Enrollment(
enrollment_id CHAR(9) PRIMARY KEY,
student_id CHAR(8),
course_id CHAR(7),
FOREIGN KEY(student_id) REFERENCES Student(student_id),
FOREIGN KEY(course_id) REFERENCES Course(course_id)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS Grade(
enrollment_id CHAR(9),
score integer,
grade CHAR(1),
FOREIGN KEY(enrollment_id) REFERENCES Enrollment(enrollment_id)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS Offering(
id CHAR(5) PRIMARY KEY,
trimester CHAR(1),
campus CHAR(2),
year integer,
course_id CHAR(7),
FOREIGN KEY(course_id) REFERENCES Course(course_id)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS CourseManagement(
admin_id CHAR(8),
course_id CHAR(7),
status VARCHAR(30),
FOREIGN KEY(admin_id)REFERENCES AdminStaff(admin_id),
FOREIGN KEY(course_id)REFERENCES Course(course_id),
PRIMARY KEY(admin_id, course_id)
)Engine=innodb;

CREATE TABLE IF NOT EXISTS EnrollmentManagement(
admin_id CHAR(8),
enrollment_id CHAR(9),
status VARCHAR(30),
FOREIGN KEY(admin_id)REFERENCES AdminStaff(admin_id),
FOREIGN KEY(enrollment_id)REFERENCES Enrollment(enrollment_id),
PRIMARY KEY(admin_id, enrollment_id)
)Engine=innodb;



