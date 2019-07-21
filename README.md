

# Portal

Management Information System for UDM Portal

## Getting Started

### Installing local server

Download and run [XAMPP](https://www.apachefriends.org/download.html)

### Clone

```sh
cd C:\xampp\htdocs (default)
git clone https://github.com/garciamarvs/portal.git
```

### Creating the Database

 - Go to phpMyAdmin 
 - Create `portal`database
 - Import `portal.sql` into the newly created database
 
 Note: You may need to change the database credentials in `application\config` to match yours.

### See it now on!
Navigate to your `localhost/portal`

## Modules
- Includes Online Faculty Evaluation System
  - Set Schedule for Evaluation
  - Faculty Evaluation
  - View Results
  - Set Questions
  
- Semester Module
  - View Students enrolled in semester
  - Search Student enrolled in semester

- Enrollment
  - Set Schedule for Enrollment
  - Enrollment for Students

- Grades
  - View Grades
  
- Course Masterlist
  - View Course Assigned to Faculty
  - View Students Enrolled in Course
