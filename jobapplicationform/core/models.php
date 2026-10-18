<!-- Functions for interacting with the database -->

<?php

require_once 'dbConfig.php';

function insertNewApplication($pdo, $firstName, $lastName, $email, $phoneNumber, $techStack, $yearsOfExperience, $educationLevel, $expectedSalary)
{

    $sql = "INSERT INTO applications (firstName,lastName,email,phoneNumber,techStack,yearsOfExperience,educationLevel,expectedSalary) VALUES (?,?,?,?,?,?,?,?)";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([
        $firstName,
        $lastName,
        $email,
        $phoneNumber,
        $techStack,
        $yearsOfExperience,
        $educationLevel,
        $expectedSalary
    ]);

    if ($executeQuery) {
        return true;
    }
}

function seeAllApplicationRecords($pdo)
{
    $sql = "SELECT * FROM applications ORDER BY dateAdded DESC";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getApplicationByID($pdo, $id)
{
    $sql = "SELECT * FROM applications WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])) {
        return $stmt->fetch();
    }
}

function updateApplication(
    $pdo,
    $id,
    $firstName,
    $lastName,
    $email,
    $phoneNumber,
    $techStack,
    $yearsOfExperience,
    $educationLevel,
    $expectedSalary
) {

    $sql = "UPDATE applications 
				SET firstName = ?, 
					lastName = ?, 
					email = ?, 
					phoneNumber = ?, 
					techStack = ?, 
					yearsOfExperience = ?, 
					educationLevel = ?, 
					expectedSalary = ? 
			WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([
        $firstName,
        $lastName,
        $email,
        $phoneNumber,
        $techStack,
        $yearsOfExperience,
        $educationLevel,
        $expectedSalary,
        $id
    ]);

    if ($executeQuery) {
        return true;
    }
}

function deleteApplication($pdo, $id)
{

    $sql = "DELETE FROM applications WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery) {
        return true;
    }

}

?>