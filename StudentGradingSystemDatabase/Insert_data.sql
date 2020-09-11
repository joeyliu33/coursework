INSERT INTO User values 
('u01','Bruce','Whyne','DBA'),
('u02','Cristiano','Penaldo','admin staff'),
('u03','Lionel','Missy','admin staff'),
('u04','Seb','Binary','academic staff'),
('u05','Jazz','Wood','academic staff'),
('u06','Miguel','Franco','academic staff'),
('u07','Angela','Merkal','student'),
('u08','Donaldo','True','student'),
('u09','Hillarious','Blinton','student'),
('u10','Tarra','Obana','student');

INSERT INTO Student values
('s01','Angela','Merkal','1991/01/01','F','66809169','u07'),
('s02','Donaldo','True','1992/02/02','M','62154589','u08'),
('s03','Hillarious','Blinton','1993/03/03','F','64522325','u09'),
('s04','Tarra','Obana','1994/04/04','M','61122365','u10');

INSERT INTO AcademicStaff values
('a01','Seb','Binary','Professor','u04'),
('a02','Jazz','Wood','Asso. Professor','u05'),
('a03','Miguel','Frabci','Lecturer','u06');

INSERT INTO AdminStaff values
('f01','Cristiano','Penaldo','Enrollment','u02'),
('f02','Lionel','Missy','Courses','u03');

INSERT INTO Course values
('101ICT','Information Management','a01'),
('102ICT','Object oriented Porgramming','a02'),
('101STA','Statistics','a02'),
('101CS','Data Analytics','a01'),
('102CS','Information Retrieval','a03');

INSERT INTO Class values
('a01','101ICT','Monday 8am-10am'),
('a01','102ICT','Monday 9am-11am'),
('a03','101CS','Tuesday 8am-10am'),
('a02','101ICT','Thursday 2pm-4pm'),
('a02','101STA','Wednesday 1pm-3pm');

INSERT INTO Enrollment values
('e01','s01','101ICT'),
('e02','s01','101STA'),
('e03','s01','101CS'),
('e04','s02','102ICT'),
('e05','s02','101CS'),
('e06','s03','102CS'),
('e07','s04','102ICT'),
('e08','s04','101STA'),
('e09','s04','101CS'),
('e10','s04','102CS');

INSERT INTO Grade values
('e01', '75','6'),
('e02', '80','6'),
('e03', '92','7'),
('e04', '86','7'),
('e05', '71','5'),
('e06', '65','5'),
('e07', '55','4'),
('e08', '66','5'),
('e09', '80','6'),
('e10', '86','7');


INSERT INTO Offering values 
('o01', '1','GC','2017','101ICT'),
('o02', '2','GC','2017','101ICT'),
('o03', '2','NA','2018','102ICT'),
('o04', '1','GC','2017','101STA'),
('o05', '1','NA','2017','101STA'),
('o06', '1','GC','2017','101CS'),
('o07', '1','GC','2018','102CS'),
('o08', '3','GC','2018','102CS');

INSERT INTO CourseManagement values
('f02','101ICT','Open'),
('f02','102ICT','Open'),
('f02','101STA','Open'),
('f02','101CS','Open'),
('f02','102CS','Open');


INSERT INTO EnrollmentManagement values
('f01','e01','approved'),
('f01','e02','approved'),
('f01','e03','approved'),
('f01','e04','approved'),
('f01','e05','approved'),
('f01','e06','approved'),
('f01','e07','approved'),
('f01','e08','approved'),
('f01','e09','approved'),
('f01','e10','tuition fee pending');





