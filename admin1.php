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
            <?php require_once "config/db.php";
            $stmt = $conn->query("SELECT * FROM tracking");
            $stmt->execute();
            $trackings = $stmt->fetchAll();
            
            if (!$trackings) {
                echo "";
            } else 
            foreach($trackings as $tracking)  
            
            ?>
        
     
      <section class="content">
<div class="container-fluid">
            <?php require_once "config/db2.php"; ?>
        <div class="modal fade" id="steel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Steel Wool</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_admin.php" method="post" enctype="multipart/form-data">
                    <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $tracking['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                    <div class="form-group">
                    <label for="Round" class="col-form-label">Round:</label>
                    <select name="roundsteel" class="form-control" required>
                    <option value="">-เลือกรอบ-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM round");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['round'];?>"><?= $row['round'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="LEVEL" class="col-form-label">LEVEL:</label>
                    <select name="steel" class="form-control" required>
                    <option value="">-เลือกระดับ LEVEL-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM steel");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['steel'];?>"><?= $row['steel'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result:</label>
                    <select name="resultsteel" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['result'];?>"><?= $row['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="Tester" class="col-form-label">Tester:</label>
                    <select name="testersteel" class="form-control" required>
                    <option value="">-เลือก tester -</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tester");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tester'];?>"><?= $row['tester'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
</div>
</section>
 

<section class="content">
<div class="container-fluid">
            <?php require_once "config/db2.php"; ?>
        <div class="modal fade" id="boling" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Boiling Water</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_admin.php" method="post" enctype="multipart/form-data" >
                    <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $tracking['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                    <div class="form-group">
                    <label for="Round" class="col-form-label">Round:</label>
                    <select name="roundboiling" class="form-control" required>
                    <option value="">-เลือกรอบ-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM round");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['round'];?>"><?= $row['round'];?></option>
                    <?php } ?>
                    </select>
                    </div>

                    <hr>
                    <h5  align="center"> CC </h5>
                    <hr>
                    <div class="row">
                    <div class="col-sm-6">
                        <h5 align="center" > CYCLE 1 </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Abruptly:</label>
                    <select name="abruptly_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Abruptly-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['abruptly'];?>"><?= $row['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <h5 align="center" > CYCLE 2 </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Abruptly:</label>
                    <select name="abruptly_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Abruptly-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['abruptly'];?>"><?= $row['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Break:</label>
                    <select name="break_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Break-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['break'];?>"><?= $row['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Break:</label>
                    <select name="break_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Break-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['break'];?>"><?= $row['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['peeling'];?>"><?= $row['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['peeling'];?>"><?= $row['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tape'];?>"><?= $row['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tape'];?>"><?= $row['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <hr>
                    <h5  align="center"> CX </h5>
                    <hr>
                    <div class="row">
                    <div class="col-sm-6">
                        <h5 align="center" > CYCLE 1 </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Abruptly:</label>
                    <select name="abruptly_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Abruptly-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['abruptly'];?>"><?= $row['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <h5 align="center" > CYCLE 2 </h5>
                    <div class="form-group">
                    <label for="Abruptly" class="col-form-label">Abruptly:</label>
                    <select name="abruptly_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Abruptly-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM abruptly");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['abruptly'];?>"><?= $row['abruptly'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Break:</label>
                    <select name="break_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Break-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['break'];?>"><?= $row['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Break" class="col-form-label">Break:</label>
                    <select name="break_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Break-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM break");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['break'];?>"><?= $row['break'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>


                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['peeling'];?>"><?= $row['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Peeling" class="col-form-label">Peeling:</label>
                    <select name="peeling_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Peeling-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM peeling");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['peeling'];?>"><?= $row['peeling'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    

                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cc1" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tape'];?>"><?= $row['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tape Test" class="col-form-label">Tape Test:</label>
                    <select name="tape_cc2" class="form-control" required>
                    <option value="">-เลือกระดับ Tape Test-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tape");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tape'];?>"><?= $row['tape'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                    
                    <hr>
                    <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Result" class="col-form-label">Result:</label>
                    <select name="resultboiling" class="form-control" required>
                    <option value="">-เลือก Result-</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM result");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['result'];?>"><?= $row['result'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group">
                    <label for="Tester" class="col-form-label">Tester:</label>
                    <select name="testersboiling" class="form-control" required>
                    <option value="">-เลือก tester -</option>
                    <?php
                    include 'config/db.php';
                    $stmt = $conn->prepare("SELECT* FROM tester");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                    foreach($result as $row) {
                    ?>
                    <option value="<?= $row['tester'];?>"><?= $row['tester'];?></option>
                    <?php } ?>
                    </select>
                    </div>
                    </div>
                    </div>
                
                <hr>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
                    <button type="submit" name="submit" class="btn btn-success" >Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
    </div>
</div>
</section>


<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Tracking </h1>
            </div>

    <div class="col-md-6 d-flex justify-content-end">
      <form action="search.php" class="form-group my-3" method="POST">
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
    
        <hr>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success">
                <?php 
                    echo $_SESSION['success'];
                    unset($_SESSION['success']); 
                ?>
            </div>
        <?php } ?>
        <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger">
                <?php 
                    echo $_SESSION['error'];
                    unset($_SESSION['error']); 
                ?>
            </div>
        <?php } ?>
        </div>
       
        <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                
        
        
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">BatchGenQC</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Machine</th>  
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">LensType</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">Material</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">MonomerHC</th>
           
                </tr>
            </thead>
             <tbody>
                
        
<?php 
$stmt = $conn->query("SELECT * FROM tracking");
$stmt->execute();
$trackings = $stmt->fetchAll();

if (!$trackings) {
    echo "<p><td colspan='6' class='text-center'>No data available</td></p>";
} else {
foreach($trackings as $tracking)  {  

?>
<tr>
<th scope="row">
    <?php echo $tracking['BatchGenQC']; ?></th>
    <td><?php echo $tracking['HCMachine']; ?></td>
    <td><?php echo $tracking['LensType']; ?></td>
    <td><?php echo $tracking['Material']; ?></td>
    <td><?php echo $tracking['MonomerHC']; ?></td>                      
   
                        <td>
                        <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tape" data-bs-whatever="@mdo">tape</button>
                        </div>
                        </td>

                        <td>
                            <a href="tape123.php?id=<?php echo $tracking['BatchGenQC']; ?>" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                        <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#steel" data-bs-whatever="@mdo">steel</button>
                        </div>
                        </td>
                        <td>
                        <div class="col-md-6 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#boling" data-bs-whatever="@mdo">boling</button>
                        </div>
                        </td>
         <th  tabindex="0" rowspan="1" colspan="1" style="width: 0%;"></th>

                    </tr>

            </tbody>
            <?php }  } ?>
            </table>
    </div>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</section>
</main>
</div>

