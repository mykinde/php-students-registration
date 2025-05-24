# Student Registration System

## Overview
A pure PHP and MySQL based Student Registration System with Bootstrap-styled frontend. It allows students to register and log in, while an admin can manage student records with features such as search, filter, pagination, update, and password reset.

## Features
- **Student Registration**: Collects name, email, password, level, faculty, department, matric number, gender, and phone.
- **Dynamic Department Dropdown**: Departments update instantly based on faculty selection using JavaScript.
- **Secure Authentication**: Passwords hashed using `password_hash()`.
- **Student Login & Dashboard**: Secure login for students to access their profiles.
- **Admin Panel**:
  - Admin login
  - Paginated student listing
  - Search and filter students by multiple criteria
  - Edit student details (except email)
  - Reset student passwords
- **Bootstrap 5 Styling**: Responsive and modern UI.
- **Modular Codebase**: Organized folders and reusable components.

## Requirements
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache or compatible web server
- Composer (optional, if you want to add dependencies)
- Internet connection (for Bootstrap CDN)

## Installation
1. Clone or download the repository into your web server directory (e.g., `htdocs` or `www`).
2. Create a MySQL database, e.g., `student_registration`.
3. Import the provided SQL schema (`database.sql`) to create tables and insert initial faculties and departments.
4. Configure database connection:
   - Edit `/config/db.php` and update credentials:
     ```php
     $host = 'localhost';
     $db = 'student_registration';
     $user = 'your_db_user';
     $pass = 'your_db_password';

5. Open the project in your browser:
http://localhost/student-registration/
Access:
Student pages: register, login, dashboard.
Admin pages: /admin/login.php
Usage
Student Registration: Fill out the registration form and submit.
Student Login: Use registered email and password.
Admin Login: Default admin credentials (set during installation).
Admin Management: Use admin panel to manage student records efficiently.
Folder Structure



### /student-registration/
│
├── config/         # Database connection

├── includes/       # Common headers, footers, session checks

├── js/            # JavaScript for dynamic dropdown

├── admin/         # Admin panel scripts

├── register.php   # Student registration page

├── login.php      # Student login page

├── dashboard.php  # Student dashboard

├── logout.php     # Logout script for all users

├── index.php      # Landing page

└── README.md      # This file


### Security Notes
Passwords are hashed with PHP’s password_hash() for security.
Session checks protect restricted pages.
Input validation and sanitization are recommended if you extend the project.
Contribution
Feel free to fork, improve, and submit pull requests.

### License
MIT License