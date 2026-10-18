<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineer Job Application</title>
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

        input[type="submit"] {
            width: auto;
            padding: 0 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px;
        }

        input[type="checkbox"] {
            width: auto;
            height: auto;
        }
    </style>
</head>

<body>
    <h3>Software Engineer Job Application Form. Fill in your details below to apply.</h3>
    <form action="core/handleForms.php" method="POST">
        <p><label for="firstName">First Name</label><br>
            <input type="text" name="firstName" required>
        </p>
        <p><label for="lastName">Last Name</label><br>
            <input type="text" name="lastName" required>
        </p>
        <p><label for="email">Email</label><br>
            <input type="email" name="email" required>
        </p>
        <p><label for="phoneNumber">Phone Number</label><br>
            <input type="text" name="phoneNumber">
        </p>
        <p><label>Tech Stack (select all that apply)</label><br>
            <?php
            $stackOptions = ["Full Stack", "Frontend", "Backend", "PHP", "JavaScript", "Python", "Java", "MySQL", "Laravel", "React", "Node.js"];
            foreach ($stackOptions as $option) { ?>
                <label style="margin-right:15px;">
                    <input type="checkbox" name="techStack[]" value="<?php echo $option; ?>">
                    <?php echo $option; ?>
                </label>
            <?php } ?>
        </p>
        <p><label for="yearsOfExperience">Years of Experience</label><br>
            <input type="number" name="yearsOfExperience" min="0" value="0">
        </p>
        <p><label for="educationLevel">Education Level</label><br>
            <select name="educationLevel">
                <option value="High School">High School</option>
                <option value="Associate Degree">Associate Degree</option>
                <option value="Bachelor's Degree">Bachelor's Degree</option>
                <option value="Master's Degree">Master's Degree</option>
            </select>
        </p>
        <p><label for="expectedSalary">Expected Monthly Salary (PHP)</label><br>
            <select name="expectedSalary" required>
                <option value="">-- Select salary range --</option>
                <option value="₱20,000 - ₱30,000">₱20,000 - ₱30,000</option>
                <option value="₱31,000 - ₱45,000">₱31,000 - ₱45,000</option>
                <option value="₱46,000 - ₱60,000">₱46,000 - ₱60,000</option>
                <option value="₱61,000 - ₱80,000">₱61,000 - ₱80,000</option>
                <option value="₱81,000 - ₱100,000">₱81,000 - ₱100,000</option>
                <option value="₱101,000 - ₱150,000">₱101,000 - ₱150,000</option>
                <option value="₱151,000+">₱151,000+</option>
                <option value="Negotiable">Negotiable</option>
            </select>
        </p>
        <p><input type="submit" name="insertNewApplicationBtn" value="Submit Application"></p>
    </form>

    <table style="width:100%; margin-top: 50px;">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Tech Stack</th>
            <th>Years of Experience</th>
            <th>Education Level</th>
            <th>Expected Salary</th>
            <th>Date Added</th>
            <th>Action</th>
        </tr>

        <?php $seeAllApplicationRecords = seeAllApplicationRecords($pdo); ?>
        <?php foreach ($seeAllApplicationRecords as $row) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['id']); ?></td>
                <td><?php echo htmlspecialchars($row['firstName']); ?></td>
                <td><?php echo htmlspecialchars($row['lastName']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['phoneNumber']); ?></td>
                <td><?php echo htmlspecialchars($row['techStack']); ?></td>
                <td><?php echo htmlspecialchars($row['yearsOfExperience']); ?></td>
                <td><?php echo htmlspecialchars($row['educationLevel']); ?></td>
                <td><?php echo htmlspecialchars($row['expectedSalary']); ?></td>
                <td><?php echo htmlspecialchars($row['dateAdded']); ?></td>
                <td>
                    <a href="editapplication.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="deleteapplication.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>

</html>