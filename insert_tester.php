
<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_POST['submit'])) {
        $tester = $_POST['tester'];
       
       
        $stmt = $conn->prepare("INSERT INTO tester (tester)
        VALUES (:tester)");
        $stmt->bindParam(':tester', $tester, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: option_host.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: option_host.php");
        }
    }

?>

