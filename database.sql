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
    description varchar(5000)
);

-- Step 3: Create the 'user_achievements' table
CREATE TABLE students_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    feedback TEXT NOT NULL,
    feedback_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES profile(user_id) ON DELETE CASCADE
);

-- Step 4: Create the 'student_audios' table
CREATE TABLE IF NOT EXISTS student_audios (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    status ENUM('pending', 'reviewed') DEFAULT 'pending',
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    feedback VARCHAR(255) DEFAULT NULL,
    FOREIGN KEY (user_id) REFERENCES profile(user_id)
);
CREATE TABLE button_clicks (
    id INT PRIMARY KEY,
    click_date date,
    click_count INT DEFAULT 0
);
-- hestoy of quran read
CREATE TABLE user_surah_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,             -- assuming you have user authentication
    surah_id varchar (500) NOT NULL,             -- ID of the Surah read or last visited
    is_read BOOLEAN DEFAULT FALSE,     -- Indicates if the Surah is marked as read
    last_visited BOOLEAN DEFAULT FALSE -- Indicates if the Surah is the last visited one
);

-- To drop the database, use:
#DROP DATABASE user_profiles;
