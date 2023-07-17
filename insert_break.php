
<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_POST['submit'])) {
        $break = $_POST['break'];
       
       
        $stmt = $conn->prepare("INSERT INTO break (break)
        VALUES (:break)");
        $stmt->bindParam(':break', $break, PDO::PARAM_STR);
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


