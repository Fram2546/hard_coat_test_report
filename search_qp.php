<?php
require('config/db.php');
$emp_data = $_POST["emp_data"];
$sql = "SELECT * FROM tracking WHERE BatchGenQC LIKE '%$emp_data%' OR id LIKE '%$emp_data%' ORDER BY BatchGenQC ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
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
<?php include("menu_admin.php"); ?> 
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-6">
      <section class="content">
      <div class="container-fluid">

      <div class="container mt-1">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Tracking</h1>
            </div>
     <div class="col-md-6 d-flex justify-content-end">
      <form action="search_qp.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-9">
          <input type="text" placeholder="กรอกTrackingที่ต้องการค้น" class="form-control" name="emp_data" required>
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
    
                        <th scope="col" style="width: 0%;">ID</th> 
                        <th  scope="col" style="width: 5%;">PSNo</th>
                        <th   scope="col" style="width: 5%;">BatchGenQC</th>
                        <th   scope="col" style="width: 5%;">Tape Test</th>
                        <th  scope="col" style="width: 5%;">Steel Wool</th>
                        <th  scope="col" style="width: 5%;">Boling Water</th>
                        <th  scope="col" style="width: 5%;">Tint</th>
                </tr>
            </thead>
        <tbody  align="center" >
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                    <td><?php echo $row['id']; ?></td>
                    <th scope="id"><?php echo $row['PSNo']; ?></th>
                    <th scope="id"><?php echo $row['BatchGenQC']; ?></th>
                    <td><?php echo $row['resulttape']; ?></td>
                    <td><?php echo $row['resultsteel']; ?></td>
                    <td><?php echo $row['resultboling']; ?></td>
                    <td><?php echo $row['resulttint']; ?></td>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 0%;"></th>
                  
                    </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-danger">
        <b>ไม่พบข้อมูล!!</b>
      </div>
    <?php } ?>
   

  </div>
 <a href="qp.php" class="btn btn-success">กลับหน้าแรก</a>

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