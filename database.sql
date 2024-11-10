-- Step 1: Create the database
CREATE DATABASE IF NOT EXISTS user_profiles;

-- Use the newly created database
USE user_profiles;

-- Step 2: Create the 'profile' table with the specified columns
CREATE TABLE IF NOT EXISTS profile (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    gender ENUM('F', 'M') NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    age INT CHECK (age >= 0),
    role ENUM('educator', 'student') NOT NULL
);

-- Step 3: Create the 'user_achievements' table
CREATE TABLE IF NOT EXISTS user_achievements (
    user_id INT,
    link_id VARCHAR(10),
    PRIMARY KEY (user_id, link_id),
    FOREIGN KEY (user_id) REFERENCES profile(user_id)
);

-- Step 4: Create the 'student_audios' table
CREATE TABLE IF NOT EXISTS student_audios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file_path VARCHAR(255) NOT NULL,
    status ENUM('pending', 'reviewed') DEFAULT 'pending',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    feedback VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES profile(user_id)
);
CREATE TABLE button_clicks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    click_date DATE NOT NULL,
    click_count INT DEFAULT 1
);
-- To drop the database, use:
-- DROP DATABASE user_profiles;
