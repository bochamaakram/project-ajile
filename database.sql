-- Step 1: Create the database
CREATE DATABASE IF NOT EXISTS user_profiles;

-- Use the newly created database
USE user_profiles;

-- Step 2: Create the 'profile' table with the specified columns
CREATE TABLE IF NOT EXISTS profile (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    gender ENUM('F', 'M') NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    age INT CHECK (age >= 0),
    role ENUM('educator', 'student') NOT NULL
);
#drop database user_profiles;