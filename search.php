<?php
require('config/db3.php');
$emp_data = $_POST["emp_data"];

$sql = "SELECT * FROM EXEC S_QA_Test_HC_QRCode '66042011A85' WHERE BatchGenQC LIKE '%$emp_data%' OR PSNo LIKE '%$emp_data%' ORDER BY BatchGenQC ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
$stmt = sqlsrv_query($con,$query); //รันคำสั่งที่ถูกเก็บไว้ในตัวแปร $sql
$count = sqlsrv_num_rows($stmt); //เก็บผลที่ได้จากคำสั่ง $result เก็บไว้ในตัวแปร $count
$order = 1; //ให้เริ่มนับแถวจากเลข 1
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD BS5</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<?php include("menu_admin.php"); ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <section class="content">
      <div class="container-fluid">


<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Tracking </h1>
            </div>
        </div>
        <form action="search.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-6">
          <input type="text" placeholder="กรอกชื่อหรือนามสกุลที่ต้องการค้น" class="form-control" name="emp_data" required>
        </div>
        <div class="col-6">
          <input type="submit" value="ค้นหาข้อมูลสมาชิก" class="btn btn-info">
        </div>
      </div>
    </form>
    <?php if ($count > 1) { ?>
       <hr>
        <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">PSNo</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">BatchGenQC</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Date</th>
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
             <tbody>
                
            
                <tr  align="center" >   
        
                        <td><?php echo $row['PSNo']; ?></td>
                        <td><?php echo $row['BatchGenQC']; ?></td>
                        <td><?php echo date_format($row["HCDate"],"Y-m-d"); ?> </td>
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

            </tbody>

            </table>
            
    <?php  ?>
    <?php } else { ?>
      <div class="alert alert-danger">
        <b>ไม่พบข้อมูล!!</b>
      </div>
    <?php } ?>
    <a href="admin.php" class="btn btn-success">กลับหน้าแรก</a>
    </div>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</section>
</main>
</div>

