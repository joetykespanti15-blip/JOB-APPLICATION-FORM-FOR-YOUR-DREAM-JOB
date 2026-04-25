<?php 
require_once 'dbConfig.php';

// READ: Fetch all applicants
function getAllApplicants($pdo) {
    if (!$pdo) { return []; } // Safety check
    
    $sql = "SELECT * FROM applicants ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

// CREATE: Insert a new applicant
function insertApplicant($pdo, $fName, $lName, $email, $specialization, $exp, $github, $status) {
    $sql = "INSERT INTO applicants (first_name, last_name, email, specialization, years_experience, github_link, application_status) VALUES (?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$fName, $lName, $email, $specialization, $exp, $github, $status]);
}

// READ: Fetch single record
function getApplicantByID($pdo, $id) {
    $sql = "SELECT * FROM applicants WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// UPDATE: Modify record
function updateApplicant($pdo, $fName, $lName, $email, $specialization, $exp, $github, $status, $id) {
    $sql = "UPDATE applicants SET first_name = ?, last_name = ?, email = ?, specialization = ?, years_experience = ?, github_link = ?, application_status = ? WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$fName, $lName, $email, $specialization, $exp, $github, $status, $id]);
}

// DELETE: Remove record
function deleteApplicant($pdo, $id) {
    $sql = "DELETE FROM applicants WHERE applicant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
?>