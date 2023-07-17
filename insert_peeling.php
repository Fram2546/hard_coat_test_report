
<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_POST['submit'])) {
        $peeling = $_POST['peeling'];
       
       
        $stmt = $conn->prepare("INSERT INTO peeling (peeling)
        VALUES (:peeling)");
        $stmt->bindParam(':peeling', $peeling, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: option_Level_host.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: option_Level_host.php");
        }
    }

?>


