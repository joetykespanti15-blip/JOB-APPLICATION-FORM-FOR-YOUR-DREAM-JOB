<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Edit Application</title></head>
<body>
    <?php $getApplicant = getApplicantByID($pdo, $_GET['id']); ?>
    <h1>Edit Application for <?php echo $getApplicant['first_name']; ?></h1>
    <form action="core/handleForms.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <p><label>First Name:</label> <input type="text" name="fName" value="<?php echo $getApplicant['first_name']; ?>"></p>
        <p><label>Last Name:</label> <input type="text" name="lName" value="<?php echo $getApplicant['last_name']; ?>"></p>
        <p><label>Email:</label> <input type="email" name="email" value="<?php echo $getApplicant['email']; ?>"></p>
        <p><label>Specialization:</label> <input type="text" name="specialization" value="<?php echo $getApplicant['specialization']; ?>"></p>
        <p><label>Years of Exp:</label> <input type="number" name="exp" value="<?php echo $getApplicant['years_experience']; ?>"></p>
        <p><label>GitHub:</label> <input type="text" name="github" value="<?php echo $getApplicant['github_link']; ?>"></p>
        <p>
            <label>Status:</label> 
            <select name="status">
                <option value="Pending" <?php echo ($getApplicant['application_status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="Accepted" <?php echo ($getApplicant['application_status'] == 'Accepted') ? 'selected' : ''; ?>>Accepted</option>
                <option value="Rejected" <?php echo ($getApplicant['application_status'] == 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
            </select>
        </p>
        <input type="submit" name="editBtn" value="Update Record">
    </form>
</body>
</html>