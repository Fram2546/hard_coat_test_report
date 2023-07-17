
<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_POST['submit'])) {
        $tape = $_POST['tape'];
       
       
        $stmt = $conn->prepare("INSERT INTO tape (tape)
        VALUES (:tape)");
        $stmt->bindParam(':tape', $tape, PDO::PARAM_STR);
        $tapes = $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: option_Level_host.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: option_Level_host.php");
        }
    }

?>


