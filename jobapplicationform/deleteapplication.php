<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Application</title>
    <style>
        body {
            font-family: "Arial";
        }

        input[type="submit"] {
            font-size: 1.2em;
            height: 40px;
            padding: 0 20px;
        }
    </style>
</head>

<body>
    <h1>Are you sure you want to delete this application?</h1>
    <?php $getApplicationByID = getApplicationByID($pdo, $_GET['id']); ?>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $getApplicationByID['id']; ?>">

        <div class="applicationContainer" style="border-style: solid; 
        font-family: 'Arial'; padding: 10px;">
            <p>First Name:
                <?php echo htmlspecialchars($getApplicationByID['firstName']); ?>
            </p>
            <p>Last Name:
                <?php echo htmlspecialchars($getApplicationByID['lastName']); ?>
            </p>
            <p>Email:
                <?php echo htmlspecialchars($getApplicationByID['email']); ?>
            </p>
            <p>Phone Number:
                <?php echo htmlspecialchars($getApplicationByID['phoneNumber']); ?>
            </p>
            <p>Tech Stack:
                <?php echo htmlspecialchars($getApplicationByID['techStack']); ?>
            </p>
            <p>Years of Experience:
                <?php echo htmlspecialchars($getApplicationByID['yearsOfExperience']); ?>
            </p>
            <p>Education Level:
                <?php echo htmlspecialchars($getApplicationByID['educationLevel']); ?>
            </p>
            <p>Expected Monthly Salary (PHP):
                <?php echo htmlspecialchars($getApplicationByID['expectedSalary']); ?>
            </p>
            <input type="submit" name="deleteApplicationBtn" value="Delete">
            <a href="index.php">Cancel</a>
        </div>
    </form>
</body>

</html>