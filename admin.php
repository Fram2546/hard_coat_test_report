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
      <?php 
  require_once "config/db1.php"; 
  ?>

<div class="modal fade" id="confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add BatchGenQC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_admin.php" method="post" enctype="multipart/form-data">
            <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text" readonly value="<?php echo $row['BatchGenQC']; ?>" required class="form-control" name="BatchGenQC" >
                    <label for="PSNo" class="col-form-label">PSNo:</label>
                    <input type="text" readonly value="<?php echo $row['PSNo']; ?>" required class="form-control" name="PSNo" >
                    <label for="HCMachine" class="col-form-label"> HCMachine :</label>
                    <input type="text" value="<?php echo $row['HCMachine']; ?>" required class="form-control" name="HCMachine" >
                    <label for="HCOven" class="col-form-label"> HCOven :</label>
                    <input type="text" value="<?php echo $row['HCOven']; ?>" required class="form-control" name="HCOven" >
                    <label for="HCOvenRound" class="col-form-label"> HCOvenRound :</label>
                    <input type="text" value="<?php echo $row['HCOvenRound']; ?>" required class="form-control" name="HCOvenRound" >
                    <label for="LensType" class="col-form-label"> LensType :</label>
                    <input type="text" value="<?php echo $row['LensType']; ?>" required class="form-control" name="LensType" >
                    <label for="Material" class="col-form-label"> Material :</label>
                    <input type="text" value="<?php echo $row['Material']; ?>" required class="form-control" name="Material" >
                    <label for="MonomerHC" class="col-form-label"> MonomerHC :</label>
                    <input type="text" value="<?php echo $row['MonomerHC']; ?>" required class="form-control" name="MonomerHC" >
                    <label for="CoatTime" class="col-form-label"> CoatTime :</label>
                    <input type="text" value="<?php echo $row['CoatTime']; ?>" required class="form-control" name="CoatTime" >
                    <label for="Phase" class="col-form-label"> Phase :</label>
                    <input type="text" value="<?php echo $row['Phase']; ?>" required class="form-control" name="Phase" >
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>


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
             <tbody>
                
                <?php 
                    
                    $servername = "10.3.1.20";
                    $connectioninfo=array("Database"=>"AggregatePlanning","UID"=>"sa","PWD"=>"p@ssw0rd","MultipleActiveResultSets"=>true,"CharacterSet"  => 'UTF-8');
                    $conn=sqlsrv_connect($servername,$connectioninfo);
                    if ($conn)
                    {
                    echo "";
                    }
                    else{
                        echo "Fail";
                        die(print_r(sqlsrv_errors(),true));
                    }

                    $query= "EXEC S_QA_Test_HC_QRCode '66042011A85'";
                    $stmt = sqlsrv_query($conn,$query);
                    $row = sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC) 
                    
                ?>
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
                        <td>
                        <div class="col-md-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirm" data-bs-whatever="@mdo"> confirm </button>
                        </div>
                        </td>
        

                    </tr>

            </tbody>

            </table>
    </div>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</section>
</main>
</div>

