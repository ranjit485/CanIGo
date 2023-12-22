-- Insert dummy data into Students table
INSERT INTO Students (StudentID, FirstName, LastName, Department, Class, StudentContactNo, ParentContactNo, Username, Password)
VALUES
(1, 'Aditya', 'Deshmukh', 'Computer Science', 'CS101', '9876543210', '9876543211', 'aditya_deshmukh', 'password123'),
(2, 'Snehal', 'Kulkarni', 'Electrical Engineering', 'EE201', '9876543212', '9876543213', 'snehal_kulkarni', 'pass456'),
(3, 'Amit', 'Joshi', 'Mechanical Engineering', 'ME301', '9876543214', '9876543215', 'amit_joshi', 'securepass'),
(4, 'Neha', 'Pawar', 'Civil Engineering', 'CE401', '9876543216', '9876543217', 'neha_pawar', 'strongpass'),
(5, 'Siddharth', 'Gore', 'Information Technology', 'IT501', '9876543218', '9876543219', 'siddharth_gore', 'newpassword');

-- Insert dummy data into Teachers table
INSERT INTO Teachers (TeacherID, FirstName, LastName, Position, Username, Password)
VALUES
(1, 'Dr.', 'Chavan', 'Professor', 'dr_chavan', 'teacherpass'),
(2, 'Prof', 'Deshpande', 'Assistant Professor', 'prof_deshpande', 'securepass'),
(3, 'Mrs.', 'Patil', 'Associate Professor', 'mrs_patil', 'newteacherpass'),
(4, 'Mr.', 'Gokhale', 'Lecturer', 'mr_gokhale', 'passwordteacher');

-- Insert dummy data into HODs table
INSERT INTO HODs (HODID, FirstName, LastName, Department, Username, Password)
VALUES
(1, 'Dr.', 'Bapat', 'Computer Science', 'dr_bapat', 'hodpass'),
(2, 'Prof', 'Kale', 'Electrical Engineering', 'prof_kale', 'securehodpass'),
(3, 'Dr.', 'Gupta', 'Mechanical Engineering', 'dr_gupta', 'stronghodpass'),
(4, 'Mrs.', 'Dandekar', 'Civil Engineering', 'mrs_dandekar', 'newhodpass');
