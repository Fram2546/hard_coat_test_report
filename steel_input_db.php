<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_POST['submit'])) {
        $steel = $_POST['steel'];
        $roundsteel = $_POST['roundsteel'];
        $resultsteel = $_POST['resultsteel'];
        $testersteel = $_POST['testersteel'];
       
       
        $stmt = $conn->prepare("INSERT INTO tracking SET steel = :steel, roundsteel = :roundsteel, resultsteel = :resultsteel, testersteel = :testersteel");
        $stmt->bindParam(':steel', $steel, PDO::PARAM_STR);
        $stmt->bindParam(':roundsteel', $roundsteel, PDO::PARAM_STR);
        $stmt->bindParam(':resultsteel', $resultsteel, PDO::PARAM_STR);
        $stmt->bindParam(':estersteel', $estersteel, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($stmt) {
            $_SESSION['success'] = "Data has been updated successfully";
            header("location: index.php");
        } else {
            $_SESSION['error'] = "Data has not been updated successfully";
            header("location: index.php");
        }
    }

?>



















