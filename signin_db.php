<?php
session_start();
require("config/db.php");
if (isset($_POST['signin'])) {
  //รับค่าเข้ามาจากฟอร์ม login
  $email = $_POST['email'];
  $password = ($_POST['password']);

  $sql = "SELECT * FROM users where email='" . $email . "' AND password='" . $password . "'";
  $result = mysqli_query($con, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $_SESSION["id"] = $row["id"];
    $_SESSION["email"] = $row["flistname"] . " " . $row["lastname"];
    $_SESSION["urole"] = $row["urole"];

    if ($_SESSION["urole"] == "admin") { 
      header("location:admin.php");
    }
    if ($_SESSION["urole"] == "host") {
      header("location:host.php");
    }
    if ($_SESSION["urole"] == "user") {
      header("location:user.php");
    } 
    if ($_SESSION["urole"] == "qp") {
      header("location:qp.php");
    } 
    } else {
    echo "<script>";
    echo "alert(\"ชื่อเข้าระบบหรือรหัสผ่านไม่ถูกต้อง\");";
    echo "window.history.back()";
    echo "</script>";
  }
} else {
  header("location:signin.php");
}
?>