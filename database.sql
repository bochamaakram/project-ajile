-- Step 1: Create the database
CREATE DATABASE IF NOT EXISTS user_profiles;

-- Use the newly created database
USE user_profiles;

-- Step 2: Create the 'profile' table with the specified columns
CREATE TABLE profile (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    gender ENUM('F', 'M') NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    age INT CHECK (age >= 0),
    role ENUM('educator', 'student') NOT NULL,
    description varchar(5000),
    class varchar(5)
);

-- Step 3: Create the 'user_achievements' table
CREATE TABLE students_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    feedback TEXT NOT NULL,
    feedback_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES profile(user_id) ON DELETE CASCADE
);

CREATE TABLE student_completed_juz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    juz INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES profile(user_id)
);
CREATE TABLE button_clicks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    click_date DATE NOT NULL,
    click_count INT DEFAULT 0
);

-- To drop the database, use:
#DROP DATABASE user_profiles;
