<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Application</title>
    <style>
        body {
            font-family: "Arial";
        }

        input,
        select {
            font-size: 1.2em;
            height: 40px;
            width: 250px;
        }

        input[type="checkbox"] {
            width: auto;
            height: auto;
        }

        input[type="submit"] {
            width: auto;
            padding: 0 20px;
        }
    </style>
</head>

<body>
    <?php
    $getApplicationByID = getApplicationByID($pdo, $_GET['id']);

    $educationLevels = ["High School", "Associate Degree", "Bachelor's Degree", "Master's Degree"];
    $salaryRanges = ["₱20,000 - ₱30,000", "₱31,000 - ₱45,000", "₱46,000 - ₱60,000", "₱61,000 - ₱80,000", "₱81,000 - ₱100,000", "₱101,000 - ₱150,000", "₱151,000+", "Negotiable"];
    $stackOptions = ["Full Stack", "Frontend", "Backend", "PHP", "JavaScript", "Python", "Java", "MySQL", "Laravel", "React", "Node.js"];
    $selectedStack = explode(", ", $getApplicationByID['techStack']);
    ?>

    <h3>Edit Application</h3>
    <form action="core/handleForms.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $getApplicationByID['id']; ?>">

        <p>
            <label for="firstName">First Name</label><br>
            <input type="text" name="firstName"
                value="<?php echo htmlspecialchars($getApplicationByID['firstName']); ?>" required>
        </p>
        <p>
            <label for="lastName">Last Name</label><br>
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($getApplicationByID['lastName']); ?>"
                required>
        </p>
        <p>
            <label for="email">Email</label><br>
            <input type="email" name="email" value="<?php echo htmlspecialchars($getApplicationByID['email']); ?>"
                required>
        </p>
        <p>
            <label for="phoneNumber">Phone Number</label><br>
            <input type="text" name="phoneNumber"
                value="<?php echo htmlspecialchars($getApplicationByID['phoneNumber']); ?>">
        </p>
        <p>
            <label>Tech Stack (select all that apply)</label><br>
            <?php foreach ($stackOptions as $option) { ?>
                <label style="margin-right:15px;">
                    <input type="checkbox" name="techStack[]" value="<?php echo $option; ?>" <?php if (in_array($option, $selectedStack))
                           echo 'checked'; ?>>
                    <?php echo $option; ?>
                </label>
            <?php } ?>
        </p>
        <p>
            <label for="yearsOfExperience">Years of Experience</label><br>
            <input type="number" name="yearsOfExperience" min="0"
                value="<?php echo $getApplicationByID['yearsOfExperience']; ?>">
        </p>
        <p>
            <label for="educationLevel">Education Level</label><br>
            <select name="educationLevel">
                <?php foreach ($educationLevels as $level) { ?>
                    <option value="<?php echo $level; ?>" <?php if ($getApplicationByID['educationLevel'] == $level)
                           echo 'selected'; ?>>
                        <?php echo $level; ?>
                    </option>
                <?php } ?>
            </select>
        </p>
        <p>
            <label for="expectedSalary">Expected Monthly Salary (PHP)</label><br>
            <select name="expectedSalary" required>
                <?php foreach ($salaryRanges as $range) { ?>
                    <option value="<?php echo $range; ?>" <?php if ($getApplicationByID['expectedSalary'] == $range)
                           echo 'selected'; ?>>
                        <?php echo $range; ?>
                    </option>
                <?php } ?>
            </select>
        </p>
        <p>
            <input type="submit" name="updateApplicationBtn" value="Update Application">
            <a href="index.php">Cancel</a>
        </p>
    </form>
</body>

</html>