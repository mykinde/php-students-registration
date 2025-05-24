-- Insert Faculties
INSERT INTO faculties (name) VALUES
('Science'), ('Engineering'), ('Arts');

-- Insert Departments
INSERT INTO departments (faculty_id, name) VALUES
(1, 'Computer Science'),
(1, 'Biology'),
(2, 'Mechanical Engineering'),
(2, 'Electrical Engineering'),
(3, 'History'),
(3, 'English Literature');
