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

            <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-primary" href="tracking_add.php?act=add" class="btn btn-app bg-success"><i class="fas fa-users"> เพิ่มข้อมูล Tracking </button>
            </div>
            
        </div>
       
        <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                
                        
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 5%;">BatchGenQC</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Date</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC Machine</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 7%;">HC Oven</th>
                        <th  tabindex="0" rowspan="1" colspan="1" style="width: 10%;">HC OvenRound</th>
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

                    $query= "EXEC S_QA_Test_HCOventrack '2023-04-21','L6','1'";
                    $stmt = sqlsrv_query($conn,$query);
                    $row = sqlsrv_fetch_Array($stmt,SQLSRV_FETCH_ASSOC) 
                    
                ?>
                <tr  align="center" >   
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
            
                    </tr>

            </tbody>

            </table>
    </div>
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</section>
</main>
</div>

</body>
</html>
               