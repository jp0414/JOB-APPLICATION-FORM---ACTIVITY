CREATE TABLE applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phoneNumber VARCHAR(20),
    techStack VARCHAR(255),
    yearsOfExperience INT DEFAULT 0,
    educationLevel VARCHAR(50),
    expectedSalary VARCHAR(50);
    dateAdded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);