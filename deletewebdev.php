<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 
?>
<!DOCTYPE html>
<html>
<head><title>Delete Confirmation</title></head>
<body>
    <?php $getApplicant = getApplicantByID($pdo, $_GET['id']); ?>
    <h1>Delete applicant <?php echo $getApplicant['first_name']; ?>?</h1>
    <form action="core/handleForms.php?delete_id=<?php echo $_GET['id']; ?>" method="POST">
        <input type="submit" name="deleteBtn" value="Yes, Delete">
        <a href="index.php">Cancel</a>
    </form>
</body>
</html>