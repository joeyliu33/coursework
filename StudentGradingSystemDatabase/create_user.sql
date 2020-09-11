-- 1
CREATE USER IF NOT EXISTS
'angela'@'%' IDENTIFIED BY 'AngelA132!',
'tarra'@'%' IDENTIFIED BY 'TarrA!231',
'cristiano'@'%' IDENTIFIED BY 'CRist231!',
'lionel'@'%' IDENTIFIED BY 'LioneL!2221',
'seb'@'%' IDENTIFIED BY 'SEb!221462',
'jazz'@'%' IDENTIFIED BY 'jaZZ!2666';

-- 2
-- Staff should have restricted access according to
-- their roles/positions. For example, admin staff 
-- managing enrollment can modify only enrollment 
-- information, and admin staff managing courses can only 
-- modify course information

GRANT ALL ON Enrollment TO 
'cristiano'@'%';
GRANT ALL ON EnrollmentManagement TO 
'cristiano'@'%';
GRANT ALL ON Course TO
'lionel'@'%';
GRANT ALL ON CourseManagement TO
'lionel'@'%';

-- Academic staff and students can see information about courses
-- but cannot edit it.
GRANT SELECT ON Course TO
'angela'@'%';
GRANT SELECT ON Course TO
'tarra'@'%';
GRANT SELECT ON Course TO
'seb'@'%';
GRANT SELECT ON Course TO
'jazz'@'%';

GRANT SELECT ON offering TO
'angela'@'%';
GRANT SELECT ON offering TO
'tarra'@'%';
GRANT SELECT ON offering TO
'seb'@'%';
GRANT SELECT ON offering TO
'jazz'@'%';

-- Academic staff can see the names and genders of 
-- the students but not their birthdays or phone numbers.
GRANT SELECT(first_name,last_name,sex) ON Student TO
'seb'@'%';
GRANT SELECT(first_name,last_name,sex) ON Student TO
'jazz'@'%';


-- 3.1
CREATE VIEW result_angela
AS SELECT enr.course_id, course_name, score, grade
FROM Enrollment AS enr, Course AS cor, Grade 
WHERE enr.course_id = cor.course_id AND
enr.enrollment_id = Grade.enrollment_id AND
enr.student_id = 
(SELECT student_id FROM Student WHERE first_name LIKE 'angela' 
AND last_name LIKE 'merkal');

GRANT SELECT ON result_angela TO 'angela'@'%';

CREATE VIEW result_tarra
AS SELECT enr.course_id, course_name, score, grade
FROM Enrollment AS enr, Course AS cor, Grade 
WHERE enr.course_id = cor.course_id AND
enr.enrollment_id = Grade.enrollment_id AND
enr.student_id = 
(SELECT student_id FROM Student WHERE first_name LIKE 'tarra' 
AND last_name LIKE 'obana');

GRANT SELECT ON result_tarra TO 'tarra'@'%';

-- 3.2
CREATE VIEW enrollment_for_seb
AS SELECT enrollment_id, cor.course_id, course_name, student_id
FROM Enrollment AS enr, Course AS cor, Class, AcademicStaff AS Acdemst
WHERE enr.course_id = cor.course_id AND
cor.course_id = Class.course_id AND
Class.staff_id = Acdemst.staff_id AND
Acdemst.staff_id = (
SELECT staff_id FROM AcademicStaff WHERE first_name LIKE 'seb' AND last_name 
LIKE 'binary');

GRANT SELECT ON enrollment_for_seb TO 'seb'@'%';

CREATE VIEW enrollment_for_jazz
AS SELECT enrollment_id, cor.course_id, course_name, student_id
FROM Enrollment AS enr, Course AS cor, Class, AcademicStaff AS Acdemst
WHERE enr.course_id = cor.course_id AND
cor.course_id = Class.course_id AND
Class.staff_id = Acdemst.staff_id AND
Acdemst.staff_id = (
SELECT staff_id FROM AcademicStaff WHERE first_name LIKE 'jazz' AND last_name 
LIKE 'wood');

GRANT SELECT ON enrollment_for_seb TO 'jazz'@'%';

-- 3.3
CREATE VIEW graded_by_seb
AS SELECT cor.course_id, student_id, score, grade
FROM Enrollment AS enr, Course AS cor, Class, AcademicStaff AS Acdemst, Grade
WHERE enr.course_id = cor.course_id AND
cor.course_id = Class.course_id AND
Class.staff_id = Acdemst.staff_id AND
enr.enrollment_id = Grade.enrollment_id AND
Acdemst.staff_id = (
SELECT staff_id FROM AcademicStaff WHERE first_name LIKE 'seb' AND last_name 
LIKE 'binary');

GRANT SELECT ON graded_by_seb TO 'seb'@'%';
GRANT INSERT, UPDATE, DELETE ON graded_by_seb TO 'seb'@'%';

CREATE VIEW graded_by_jazz
AS SELECT cor.course_id, student_id, score, grade
FROM Enrollment AS enr, Course AS cor, Class, AcademicStaff AS Acdemst, Grade
WHERE enr.course_id = cor.course_id AND
cor.course_id = Class.course_id AND
Class.staff_id = Acdemst.staff_id AND
enr.enrollment_id = Grade.enrollment_id AND
Acdemst.staff_id = (
SELECT staff_id FROM AcademicStaff WHERE first_name LIKE 'jazz' AND last_name 
LIKE 'wood');

GRANT SELECT ON graded_by_jazz TO 'jazz'@'%';
GRANT INSERT, UPDATE, DELETE ON graded_by_jazz TO 'jazz'@'%';


