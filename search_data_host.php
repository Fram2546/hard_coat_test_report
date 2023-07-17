<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM tracking WHERE BatchGenQC = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=data_host.php");
        }
        
    }

?>
<?php
require('config/db3.php');
$emp_data = $_POST["emp_data"];
$sql = "SELECT * FROM tracking WHERE BatchGenQC LIKE '%$emp_data%' OR PSNo LIKE '%$emp_data%' ORDER BY BatchGenQC ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
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

  <title>ข้อมูลทั้งหมด</title>
</head>

<body>
<?php include("menu_host.php"); ?> 
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-6">
      <section class="content">
      <div class="container-fluid">

      <div class="container mt-1">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Tracking</h1>
            </div>
     <div class="col-md-6 d-flex justify-content-end">
      <form action="search_data_host.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-9">
          <input type="text" placeholder="กรอกชื่อที่ต้องการค้น" class="form-control" name="emp_data" required>
        </div>
        <div class="col-3">
          <input type="submit" value="search" class="btn btn-info">
        </div>
      </div>
    </form>
     </div>

    </form>
    <?php if ($count > 0) { ?>
      <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                       <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">PSNo</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">BatchGenQC</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Machine</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">HC Oven</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Round</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">LensType</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Material</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">MonomerHC</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">CoatTime</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Phase</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Delete</th>
                </tr>
            </thead>
        <tbody  align="center" >
          <?php while ($tracking = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <td><?php echo $tracking['PSNo']; ?></td>
                        <td><?php echo $tracking['BatchGenQC']; ?></td>
                        <td><?php echo $tracking['HCMachine']; ?></td>
                        <td><?php echo $tracking['HCOven']; ?></td>
                        <td><?php echo $tracking['HCOvenRound']; ?></td>
                        <td><?php echo $tracking['LensType']; ?></td>
                        <td><?php echo $tracking['Material']; ?></td>
                        <td><?php echo $tracking['MonomerHC']; ?></td>
                        <td><?php echo $tracking['CoatTime']; ?></td>
                        <td><?php echo $tracking['Phase']; ?></td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete?');" href="?delete=<?php echo $tracking['BatchGenQC']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger">
        <b>ไม่พบข้อมูลพนักงาน!!</b>
      </div>
    <?php } ?>
   

  </div>
 <a href="data_host.php" class="btn btn-success">กลับหน้าแรก</a>

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