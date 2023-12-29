-- Insert dummy data into Students table
INSERT INTO Students (StudentID, FirstName, LastName, Department, Class, StudentContactNo, ParentContactNo, Username, Password)
VALUES
(1, 'Ranjit', 'Patil', 'Computer Science', 'CS101', '9876543210', '9876543211', 'ranjit485', 'ranjit@485'),
(2, 'Snehal', 'Kulkarni', 'Electrical Engineering', 'EE201', '9876543212', '9876543213', 'snehal485', 'snehal@485'),
(3, 'Shree', 'Phase', 'Mechanical Engineering', 'ME301', '9876543214', '9876543215', 'shree485', 'shree@485'),
(4, 'Neha', 'Pawar', 'Civil Engineering', 'CE401', '9876543216', '9876543217', 'neha485', 'neha@485'),
(5, 'Sahil', 'Gore', 'Information Technology', 'IT501', '9876543218', '9876543219', 'sahil485', 'sahil@485');

-- Insert dummy data into Teachers table -- 
INSERT INTO Teachers (TeacherID, FirstName, LastName, Department, Position, Username, Password)
VALUES
(1, 'Dr.', 'Chavan', 'CM',  'Professor', 'dr_chavan', 'Chavan@123'),
(2, 'Prof', 'Deshpande', 'Mech',  'Assistant Professor', 'prof_deshpande', 'Deshpande@123'),
(3, 'Mrs.', 'Patil', 'CM',  'Associate Professor', 'mrs_patil', 'Patil@123'),
(4, 'Mr.', 'Gokhale', 'ENTC',  'Lecturer', 'mr_gokhale', 'Gokhale@123');

-- Insert dummy data into HODs table
INSERT INTO HODs (HODID, FirstName, LastName, Department, Username, Password)
VALUES
(1, 'Dr.', 'Bapat', 'Computer Science', 'dr_bapat', 'hodpass'),
(2, 'Prof', 'Kale', 'Electrical Engineering', 'prof_kale', 'kale@123'),
(3, 'Dr.', 'Gupta', 'Mechanical Engineering', 'dr_gupta', 'gupta@123'),
(4, 'Mrs.', 'Patil', 'Civil Engineering', 'mrs_dandekar', 'Patil@123');

-- Insert dummy data into Leaves table for Maharashtra
INSERT INTO `Leaves` (
    `LeaveID`, 
    `StudentID`, 
    `TeacherID`, 
    `HODID`, 
    `LeaveType`, 
    `StartDate`, 
    `EndDate`, 
    `Status`, 
    `Reason`, 
    `TeacherApprovalStatus`, 
    `HODApprovalStatus`
)
VALUES
(1, 1, 1, 1, 'Vacation', '2023-01-01', '2023-01-07', 'Approved', 'Family trip', 'Approved', 'Approved'),
(2, 2, 2, 2, 'Sick Leave', '2023-02-15', '2023-02-17', 'Pending', 'Fever', NULL, NULL),
(3, 3, 3, 3, 'Study Leave', '2023-03-10', '2023-03-15', 'Rejected', 'Exam preparation', 'Rejected', 'Pending');
