
<?php
require('config/db1.php');
$BatchGenQC = $_POST["BatchGenQC"];
$sql = "SELECT * FROM EXEC S_QA_Test_HC_QRCode'$BatchGenQC' WHERE BatchGenQC LIKE '%$BatchGenQC%' OR PSNo LIKE '%$BatchGenQC%' ORDER BY BatchGenQC ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$result = sqlsrv_query($conn, $sql); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql

//เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
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
      <form action="serach1.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-9">
          <input type="text" placeholder="กรอกชื่อที่ต้องการค้น" class="form-control" name="BatchGenQC" required>
        </div>
        <div class="col-3">
          <input type="submit" value="search" class="btn btn-info">
        </div>
      </div>
    </form>
     </div>

    
     <form action="<?=$_SERVER['BatchGenQC'];?>" method="post">
    ค้นหา <input type="text" name="search" placeholder="กรอกคำค้นหา">
    <input type="submit" value="ค้นหา">
</form>

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
                </tr>
            </thead>
        <tbody  align="center" >
          <?php while ($row = sqlsrv_query($conn, $sql)) { ?>
            <tr>
            <td><?php echo $row['PSNo']; ?></td>
                        <td><?php echo $row['BatchGenQC']; ?></td>
                        <td><?php echo $row['HCMachine']; ?></td>
                        <td><?php echo $row['HCOven']; ?></td>
                        <td><?php echo $row['HCOvenRound']; ?></td>
                        <td><?php echo $row['LensType']; ?></td>
                        <td><?php echo $row['Material']; ?></td>
                        <td><?php echo $row['MonomerHC']; ?></td>
                        <td><?php echo $row['CoatTime']; ?></td>
                        <td><?php echo $row['Phase']; ?></td>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 0%;"></th>
                  
                    </tr>
          <?php } ?>
        </tbody>
      </table>
   
      <div class="alert alert-danger">
        <b>ไม่พบข้อมูลพนักงาน!!</b>
      </div>
    <?php  ?>
   

  </div>
 <a href="admin1.php" class="btn btn-success">กลับหน้าแรก</a>

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