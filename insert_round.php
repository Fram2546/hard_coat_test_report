
<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_POST['submit'])) {
        $round = $_POST['round'];
       
       
        $stmt = $conn->prepare("INSERT INTO round (round)
        VALUES (:round)");
        $stmt->bindParam(':round', $round, PDO::PARAM_STR);
        $rounds = $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: option_host.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: option_host.php");
        }
    }

?>


