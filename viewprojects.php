<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Applicant Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
    // Check if the ID is set in the URL
    if (isset($_GET['id'])) {
        $applicant = getApplicantByID($pdo, $_GET['id']);
    } else {
        echo "<h1>No applicant selected</h1>";
        echo '<a href="index.php">Return Home</a>';
        exit();
    }
    ?>

    <div class="container" style="border-style: solid; width: 50%; height: auto; margin-top: 20px; padding: 20px;">
        <h1>Applicant Profile: <?php echo $applicant['first_name'] . " " . $applicant['last_name']; ?></h1>
        <hr>
        <div class="applicant-info" style="line-height: 1.8; font-size: 1.2em;">
            <p><strong>Applicant ID:</strong> <?php echo $applicant['applicant_id']; ?></p>
            <p><strong>Email Address:</strong> <?php echo $applicant['email']; ?></p>
            <p><strong>Specialization:</strong> <?php echo $applicant['specialization']; ?></p>
            <p><strong>Years of Experience:</strong> <?php echo $applicant['years_experience']; ?> years</p>
            <p><strong>GitHub Portfolio:</strong> <a href="<?php echo $applicant['github_link']; ?>" target="_blank"><?php echo $applicant['github_link']; ?></a></p>
            <p><strong>Application Status:</strong> 
                <span style="color: <?php echo ($applicant['application_status'] == 'Accepted') ? 'green' : 'orange'; ?>;">
                    <?php echo $applicant['application_status']; ?>
                </span>
            </p>
            <p><strong>Date Applied:</strong> <?php echo $applicant['date_added']; ?></p>
        </div>
        
        <hr>
        <div class="actions" style="margin-top: 20px;">
            <a href="editwebdev.php?id=<?php echo $applicant['applicant_id']; ?>" style="padding: 10px; background-color: #f0ad4e; color: white; text-decoration: none; border-radius: 5px;">Edit Info</a>
            <a href="index.php" style="padding: 10px; background-color: #5bc0de; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>