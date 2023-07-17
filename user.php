<?php 

    session_start();

    require_once "config/db.php";

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
        $deletestmt = $conn->query("DELETE FROM tracking WHERE id = $delete_id");
        $deletestmt->execute();

        if ($deletestmt) {
            echo "<script>alert('Data has been deleted successfully');</script>";
            $_SESSION['success'] = "Data has been deleted succesfully";
            header("refresh:1; url=list_host.php");
        }
        
    }

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

<?php include("menu_index.php"); ?> 
<main class="col-md-12 ms-sm-auto col-lg-10 px-md-6">
      <section class="content">
      <div class="container-fluid">

      <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add BatchGenQC</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="insert_input.php" method="post" enctype="multipart/form-data">
            <label for="BatchGenQC" class="col-form-label">BatchGenQC:</label>
                    <input type="text"  value="" required class="form-control" name="BatchGenQC" >
                 
                    <label for="HCMachine" class="col-form-label"> HCMachine :</label>
                    <input type="text" value="" required class="form-control" name="HCMachine" >
                   
                    <label for="LensType" class="col-form-label"> LensType :</label>
                    <input type="text" value="" required class="form-control" name="LensType" >
                    <label for="Material" class="col-form-label"> Material :</label>
                    <input type="text" value="" required class="form-control" name="Material" >
                    <label for="MonomerHC" class="col-form-label"> MonomerHC :</label>
                    <input type="text" value="" required class="form-control" name="MonomerHC" >
                    
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        
        </div>
    </div>
</div>
        
        
    <div class="container mt-1">
        <div class="row">
            <div class="col-md-6">
                <h1>ข้อมูล Tracking</h1>
            </div>
     <div class="col-md-6 d-flex justify-content-end">
      <form action="search_user.php" class="form-group my-3" method="POST">
      <div class="row">
        <div class="col-9">
          <input type="text" placeholder="กรอกtrackingที่ต้องการค้น" class="form-control" name="emp_data" required>
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

        <table class="table">
            <thead>
                <tr role="row" class="info" align="center" >
                        <th scope="col" style="width: 0%;">ID</th>
                        <th   scope="col" style="width: 5%;">BatchGenQC</th>
                        <th   scope="col" style="width: 10%;">HC Machine</th>  
                        <th  scope="col" style="width: 5%;">LensType</th>
                        <th  scope="col" style="width: 5%;">Material</th>
                        <th   scope="col" style="width: 5%;">MonomerHC</th>
                        <th   scope="col" style="width: 5%;">Tape Test</th>
                        <th  scope="col" style="width: 5%;">Steel Wool</th>
                        <th  scope="col" style="width: 5%;">Boling Water</th>
            
                </tr>
            </thead>
            <tbody  align="center" >
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

                    <th scope="id"><?php echo $tracking['id']; ?></th>
                    <td><?php echo $tracking['BatchGenQC']; ?></td>
                    <td><?php echo $tracking['HCMachine']; ?></td>
                    <td><?php echo $tracking['LensType']; ?></td>
                    <td><?php echo $tracking['Material']; ?></td>
                    <td><?php echo $tracking['MonomerHC']; ?></td>                      
   
                    <td>
                    <a href="tape_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Tape Test</a>
                    </td>
                    <td>
                    <a href="steel_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Steel Wool</a>
                    </td>
                    <td>
                    <a href="boling_user.php?id=<?php echo $tracking['id']; ?>" class="btn btn-warning">Boling Water</a>
                    </td>
                        
                        
                    </tr>
                <?php }  } ?>
            </tbody>
            </table>
    </div>
             <div class="col-md-6 d-flex justify-content-end">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-whatever="@mdo">เพิ่มงาน</button>
            </div> 
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   
</section>
    </main>
  </div>
   
</body>
</html>
