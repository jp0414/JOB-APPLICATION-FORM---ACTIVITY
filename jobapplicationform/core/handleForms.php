<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewApplicationBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $techStack = isset($_POST['techStack']) ? implode(", ", $_POST['techStack']) : '';
    $yearsOfExperience = trim($_POST['yearsOfExperience']);
    $educationLevel = trim($_POST['educationLevel']);
    $expectedSalary = trim($_POST['expectedSalary']);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phoneNumber) && !empty($techStack) && $yearsOfExperience !== '' && !empty($educationLevel) && $expectedSalary !== '') {

        $query = insertNewApplication(
            $pdo,
            $firstName,
            $lastName,
            $email,
            $phoneNumber,
            $techStack,
            $yearsOfExperience,
            $educationLevel,
            $expectedSalary
        );

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }

}


if (isset($_POST['updateApplicationBtn'])) {
    $id = trim($_POST['id']);
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $phoneNumber = trim($_POST['phoneNumber']);
    $techStack = isset($_POST['techStack']) ? implode(", ", $_POST['techStack']) : '';
    $yearsOfExperience = trim($_POST['yearsOfExperience']);
    $educationLevel = trim($_POST['educationLevel']);
    $expectedSalary = trim($_POST['expectedSalary']);

    if (!empty($id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($phoneNumber) && !empty($techStack) && $yearsOfExperience !== '' && !empty($educationLevel) && $expectedSalary !== '') {

        $query = updateApplication(
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
        );

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Update failed";
        }

    } else {
        echo "Make sure that no fields are empty";
    }

}


if (isset($_POST['deleteApplicationBtn'])) {
    $id = trim($_POST['id']);

    if (!empty($id)) {
        $query = deleteApplication($pdo, $id);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Deletion failed";
        }
    } else {
        echo "Invalid application ID";
    }

}

?>