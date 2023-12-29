-- Create Students table
CREATE TABLE `Students` (
    `StudentID` INT NOT NULL,
    `FirstName` VARCHAR(255) NULL,
    `LastName` VARCHAR(255) NULL,
    `Department` VARCHAR(255) NULL,
    `Class` VARCHAR(255) NULL,
    `StudentContactNo` VARCHAR(15) NULL,
    `ParentContactNo` VARCHAR(15) NULL,
    `Username` VARCHAR(50) NULL,
    `Password` VARCHAR(255) NULL
);

-- Add primary key constraint to Students table
ALTER TABLE `Students` ADD PRIMARY KEY (`StudentID`);

-- Add unique constraint to the Username column in Students table
ALTER TABLE `Students` ADD UNIQUE `students_username_unique` (`Username`);

-- Create HODs table
CREATE TABLE `HODs` (
    `HODID` INT NOT NULL,
    `FirstName` VARCHAR(255) NULL,
    `LastName` VARCHAR(255) NULL,
    `Department` VARCHAR(255) NULL,
    `Username` VARCHAR(50) NULL,
    `Password` VARCHAR(255) NULL
);

-- Add primary key constraint to HODs table
ALTER TABLE `HODs` ADD PRIMARY KEY (`HODID`);

-- Add unique constraint to the Username column in HODs table
ALTER TABLE `HODs` ADD UNIQUE `hods_username_unique` (`Username`);

-- Create Teachers table
CREATE TABLE `Teachers` (
    `TeacherID` INT NOT NULL,
    `FirstName` VARCHAR(255) NULL,
    `LastName` VARCHAR(255) NULL,
    `Department` VARCHAR(255) NULL,
    `Position` VARCHAR(255) NULL,
    `Username` VARCHAR(50) NULL,
    `Password` VARCHAR(255) NULL
);

-- Add primary key constraint to Teachers table
ALTER TABLE `Teachers` ADD PRIMARY KEY (`TeacherID`);

-- Add unique constraint to the Username column in Teachers table
ALTER TABLE `Teachers` ADD UNIQUE `teachers_username_unique` (`Username`);

-- Create Leaves table
CREATE TABLE `Leaves` (
    `LeaveID` INT NOT NULL,
    `StudentID` INT NULL,
    `TeacherID` INT NULL,
    `HODID` INT NULL,
    `LeaveType` VARCHAR(255) NULL,
    `StartDate` DATETIME NULL,
    `EndDate` DATETIME NULL,
    `Status` VARCHAR(50) NULL,
    `Reason` TEXT NULL,
    `TeacherApprovalStatus` VARCHAR(50) NULL,
    `HODApprovalStatus` VARCHAR(50) NULL
);

-- Add primary key constraint to Leaves table
ALTER TABLE `leaves` ADD `LeaveID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY;

-- Add foreign key constraints to Leaves table
ALTER TABLE `Leaves` ADD CONSTRAINT `leaves_hodid_foreign` FOREIGN KEY (`HODID`) REFERENCES `HODs` (`HODID`);
ALTER TABLE `Leaves` ADD CONSTRAINT `leaves_studentid_foreign` FOREIGN KEY (`StudentID`) REFERENCES `Students` (`StudentID`);
ALTER TABLE `Leaves` ADD CONSTRAINT `leaves_teacherid_foreign` FOREIGN KEY (`TeacherID`) REFERENCES `Teachers` (`TeacherID`);

