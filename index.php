<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dream Job Application - Software Engineer</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Welcome to the Job Application System</h1>
        <h3>Dream Job: Software Engineer</h3>
        
        <form action="core/handleForms.php" method="POST">
            <p>First Name: <input type="text" name="fName" required></p>
            <p>Last Name: <input type="text" name="lName" required></p>
            <p>Email: <input type="email" name="email" required></p>
            <p>Specialization: <input type="text" name="specialization"></p>
            <p>Exp (Years): <input type="number" name="exp"></p>
            <p>GitHub: <input type="text" name="github"></p>
            <input type="submit" name="insertBtn" value="Apply Now">
        </form>
    </div>

    <table border="1" style="width: 100%; margin-top: 20px;">
        <tr>
            <th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Specialization</th><th>Action</th>
        </tr>
        <?php 
        $applicants = getAllApplicants($pdo); 
        foreach ($applicants as $row) { 
        ?>
        <tr>
            <td><?php echo $row['applicant_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['specialization']; ?></td>
            <td>
                <a href="viewprojects.php?id=<?php echo $row['applicant_id']; ?>">View</a>
                <a href="editwebdev.php?id=<?php echo $row['applicant_id']; ?>">Edit</a>
                <a href="deletewebdev.php?id=<?php echo $row['applicant_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>