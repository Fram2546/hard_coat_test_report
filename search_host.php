<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM users WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:0; url=list_host.php");
        }
        
    }

?>
<?php
require('config/db3.php');
$emp_data = $_POST["emp_data"];
$sql = "SELECT * FROM users WHERE firstname LIKE '%$emp_data%' OR Email LIKE '%$emp_data%' ORDER BY firstname ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = mysqli_query($con, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

$count = mysqli_num_rows($result); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <title>รายชื่อสมาชิกทั้งหมด</title>
</head>

<body>
<?php include("menu_host.php"); ?> 
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-6">
      <section class="content">
      <div class="container-fluid">

      <div class="container mt-1">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูลสมาชิก</h1>
            </div>

     
    <?php if ($count > 0) { ?>
      <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                        <th scope="col" style="width: 0%;">ID</th>
                        <th scope="col" style="width: 20%;">ชื่อ</th>
                        <th scope="col" style="width: 20%;">นามสกุล</th>
                        <th scope="col" style="width: 20%;">Email</th>
                        <th scope="col" style="width: 20%;">รหัสผ่าน</th>
                        <th scope="col" style="width: 10%;">ระดับ</th>
                        <th scope="col" style="width: 15%;">เวลาสมัคร</th>
                        <th scope="col" style="width: 10%;">แก้ไข</th>
                        <th scope="col" style="width: 10%;">ลบ</th>
                </tr>
            </thead>
        <tbody  align="center" >
          <?php while ($users = mysqli_fetch_assoc($result)) { ?>
            <tr>
                        <th scope="id"><?php echo $users['id']; ?></th>
                        <td><?php echo $users['firstname']; ?></td>
                        <td><?php echo $users['lastname']; ?></td>
                        <td><?php echo $users['email']; ?></td>
                        <td><?php echo $users['password']; ?></td>
                        <td><?php echo $users['urole']; ?></td>
                        <td><?php echo $users['created_at']; ?></td>
                        
                        <td>
                            <a href="edit.php?id=<?php echo $users['id']; ?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $users['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger">
        <b>ไม่มีข้อมูลในระบบ!!</b>
      </div>
    <?php } ?>
    
  </div>
<a href="list_host.php" class="btn btn-success">กลับหน้าแรก</a>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
    </section>
    </main>
  </div>
</body>

</html>